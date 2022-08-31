<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use App\Models\UserResult;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Display quiz as par user's package
        if (Auth::user()) {
            if (Auth::user()->hasRole(3)) { //For Basic package user 
                $quizes = Topic::where('topic_subscription', 3)->with('questions')->orderBy('id', 'desc')->get();
            } else if (Auth::user()->hasRole(4)) { //For Master package user
                $quizes = Topic::where('topic_subscription', 1)->with('questions')->orderBy('id', 'desc')->get();
            } else if (Auth::user()->hasRole(5)) { //For Standard package user
                $quizes = Topic::where('topic_subscription', 2)->with('questions')->orderBy('id', 'desc')->get();
            } else { //For Admin
                $quizes = Topic::with('questions')->orderBy('id', 'desc')->get();
            }

            return Inertia::render('Quiz', ['quizes' => $quizes]);
        } else {
            return Inertia::render('Welcome');
        }
    }

    /**
     * Get the questions
     *
     * @return \Illuminate\Http\Response
     */
    public function takeQuiz($id)
    {
        $TakingQuiz = Topic::where('id', $id)->firstOrFail();
        // $QuizeQue = Question::with('options')->where('topic_id',$TakingQuiz->id)->take(3)->get();
        $QuizeQue = Question::with('options')->where('topic_id', $TakingQuiz->id)->get();
        $QuizeOp = Option::where('topic_id', $TakingQuiz->id)->get();

        // dd($isattempts);
        // echo "<pre>";
        // print_r($QuizeOp);
        // echo "</pre>";die();

        return Inertia::render('TakeQuiz', ['TakeQuiz' => $TakingQuiz, 'QuizeQue' => $QuizeQue, 'QuizeOp' => $QuizeOp]);
    }

    public function getQuestion(Request $request, $id)
    {
        $TakingQuiz = Topic::where('id', $id)->firstOrFail();
        $QuizeQue = Question::with('options')->where('topic_id', $id)->skip($request->_skip)->take($request->_take)->limit($request->_limit)->get();
        $QuizeOp = Option::where('topic_id', $id)->get();
        // dd($TakingQuiz);
        // echo "<pre>";
        // print_r($QuizeOp);
        // echo "</pre>";die();

        return response()->json($QuizeQue);
        // return Inertia::render('TakeQuiz', ['TakeQuiz' => $TakingQuiz,'QuizeQue'=>$QuizeQue,'QuizeOp'=>$QuizeOp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store answer in user result table.
     */
    public function storeAnswer(Request $request)
    {
        $user_id = $request->user_id;
        $topic_id = $request->topic_id;
        // $submitted_at = date($request->submitted_at, 'H:i:s');
        // if($request->submitted_at == 
        $submitted_at = \Carbon\Carbon::parse($request->submitted_at)->format('H:i:s');
        $checkisattempts = UserResult::select('is_attempts')->where(['topic_id' => $topic_id, 'user_id' => $user_id])->groupBy('is_attempts')->orderby('is_attempts', 'desc')->first();
        // dd($request->submitted_at);
        if ($checkisattempts == null) {
            $isattempts = 1;
        } else {
            $isattempts = $checkisattempts->is_attempts + 1;
        }
        $count = 3;
        $i = 1;

        // dd($request->all());
        foreach ($request->all() as $key => $value) {
            if ($i > $count) {
                if (is_array($value)) {
                    foreach ($value as $k => $v) {
                        UserResult::create([
                            "user_id" => Auth::user()->id,
                            "topic_id" => $topic_id,
                            "submitted_at" => $submitted_at,
                            "que_id" => $key,
                            "opt_id" => $v,
                            "is_attempts" => $isattempts,
                        ]);
                    }
                } else {
                    UserResult::create([
                        "user_id" => Auth::user()->id,
                        "topic_id" => $topic_id,
                        "submitted_at" => $submitted_at,
                        "que_id" => $key,
                        "opt_id" => $value,
                        "is_attempts" => $isattempts,
                    ]);
                }
            }
            $i++;
        }
        $passData = [
            "user_id" => Auth::user()->id,
            "topic_id" => $topic_id,
            "is_attempts" => $isattempts,
        ];

        // Store result
        return response()->json($passData);
        // return Inertia::render('ShowResult', ['ShowResult' => $showResult]);
        // return $this->storeResult($passData);
    }

    /**
     * Store Result in user result table.
     */
    public function storeResult(Request $request)
    {
        // dd($request->all());
        $topic = Topic::where('id', $request->topic_id)->firstOrFail();
        $totalQue = Question::where('topic_id', $request->topic_id)->get();
        $totalMarks = $topic->passing_grade;
        $markPerQue = $totalMarks / count($totalQue);
        $getUserAns = UserResult::where(['user_id' => Auth::user()->id, 'topic_id' => $request->topic_id, 'is_attempts' => $request->is_attempts])->get();
        // dd($getUserAns);
        $userR = array();
        $true = 0;
        $false = 0;
        $i = 0;
        $orgID = array();
        $oldQue = array();
        $optIDs = array();
        $oqCount = array();
        $mark = 0;
        $truCnt = array();
        $getQuId = array();
        $isQue = array();
        $arr_len = 0;

        //! Get the users answer

        foreach ($getUserAns as $k => $ans) {
            $oldQue[] = $ans->que_id;
            $optIDs[] = $ans->opt_id;
        }
        array_unique($oldQue);

        //! Get the right answer
        $getAnss = Answer::whereIn('que_id', array_unique($oldQue))->pluck('opt_id', 'que_id');

        foreach ($getAnss as $key => $value) {
            if (!empty($value)) {
                foreach ($optIDs as $keys => $values) {
                    if ($value == $values) {
                        $true++;
                    } else {
                        $false++;
                    }
                }
            }
        }


        $showResult = [
            "total" => round(($true / count($totalQue)) * 100),
            "mark" => round($markPerQue * $true),
            "selectedop" => $optIDs,
            "topic" => $topic,
            "totalQues" => count($totalQue),
            "true" => $true,
            "false" => $false,
            // "total"=>$count,
        ];

        // return response()->json($showResult);
        return Inertia::render('ShowResult', ['ShowResult' => $showResult]);
    }

    // public function storeResult(Request $request)
    // {
    //     // dd($request);
    //     $checkData = Answer::where(['topic_id'=>$request->topic_id])->get();
    //     $data = array();
    //     $index = 1;
    //     $true= 0; $false = 0; $count = 0;
    //     foreach($checkData as $key => $value){

    //         $showdata = UserResult::where(['topic_id'=>$request->topic_id,'que_id'=>$value['que_id'],'user_id'=>$request->user_id])->get();
    //         foreach( $showdata as $key => $opts ) {
    //             if(Answer::where('opt_id',$value['opt_id'])->exists()){
    //             // if($opts->opt_id == $value['opt_id'] ){
    //                 $true += 1;
    //             }else{
    //                 $false += 1;
    //                 // continue;
    //             }
    //         }
    //         $count +=1;
    //     }
    //     $showResult = [
    //         "totalQues" => count($checkData), 
    //         "true"=>$true,
    //         "false" => $false,
    //         "total"=>$count,
    //     ];

    //     // return response()->json($showResult);
    //     return Inertia::render('ShowResult', ['ShowResult' => $showResult]);
    // }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}