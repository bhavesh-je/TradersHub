<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\Answer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $options = Option::with('questions')->with('answers')->orderBy('id', 'DESC')->get();
        return view('Backend.Quiz.Options.index', compact('options'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $question = Question::findOrFail($request->que_id);
        // $opt_count = Option::latest('id')->first();
        $opt_count = Option::select('id')->latest('id')->first();

        $option_id = Option::max('id');
        
        return view('Backend.Quiz.Options.create', compact('opt_count', 'question', 'option_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validate = $this->validate($request,[
            'que_id' => 'required',
        ]);
        
        // $arrayValidator = Validator::make($request->all(), []);
        // $arrayValidator->each('single_choice_ans', ['required|min:1|max:60']);
        
        // Insert options

        $data = [];
        $topic_id = Question::with('topics')->findOrFail($request->que_id);

        // $validate = $this->validate($request,[
        //     'que_id' => ['required', Rule::unique('options')->where(function ($query) use($topic_id, $request) {
        //         return $query->where('que_id', $request->que_id)->where('topic_id', $topic_id->topics->id);
        //     }),],
        // ]);

        // dd($request->all());
        $opt_imgs = array();
        if( $request->is_opt_img == 1 ){
            foreach( $request->file('single_choice_ans_img') as $key => $optImg){
                if( $optImg ){
                    $file = $optImg->getClientOriginalName();
                    // $filename = 'opt_'.time().'.'.$optImg->extension();
                    $optImg->move(public_path('uploads/opt-img'), $file);
                    $opt_imgs[] = $file;
                    $opt_data = [
                        'opt_img' => $file,
                        'que_id' => $request->que_id,
                        'topic_id' => $topic_id->topics->id,
                    ];
                    $option = Option::create($opt_data);
                }
            }
        } else {
            foreach( $request->single_choice_ans as $opts ) {
                $opt_data = [
                    'option' => $opts,
                    'que_id' => $request->que_id,
                    'topic_id' => $topic_id->topics->id,
                ];
               $option = Option::create($opt_data);
            }
        }
        // session(['option_id' => $option->id]);
        

        // Store options correct ans
        if( $request->multi_choice_0 ) // store multi select ans
        {
            foreach( $request->multi_choice_0 as $key => $multi_choice_ans){
                $ans_data = [
                    'opt_id' => $multi_choice_ans, 
                    'que_id' => $request->que_id, 
                    'topic_id' => $topic_id->topics->id, 
                ];
                Answer::create($ans_data);
            }
        } else { // Store single select ans
            $ans_data = [
                'opt_id' => $request->single_choice_0, 
                'que_id' => $request->que_id, 
                'topic_id' => $topic_id->topics->id, 
            ];
            Answer::create($ans_data);
        }

        return redirect()->route('questions.index')->with('success','Options created sucessfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $option = Option::with('questions')->with('answers')->find($id);
        
        // dd($option);
        return view('Backend.Quiz.Options.show', compact('option'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

        $topic_id = Question::with('topics')->findOrFail($id);
        $options = Option::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->get();
        $question = Question::findOrFail($id);
        $opt_count = Option::count();
        $answer = Answer::select('opt_id')->where('que_id', $id)->where('topic_id', $topic_id->topics->id)->get();
        $ans_arr = [];
        foreach($answer as $ans)
        {
            $ans_arr[] = $ans->opt_id;
        }
        return view('Backend.Quiz.Options.edit', compact('options', 'opt_count', 'question', 'id', 'answer', 'ans_arr'));
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
        $topic_id = Question::with('topics')->findOrFail($id);
        
        // dd($request->all());
        $opt_imgs = array();
        if( $request->is_opt_img == 1 ){
            if($request->hasFile('single_choice_ans_img')){
                foreach( $request->file('single_choice_ans_img') as $key => $optImg){
                    if( $optImg ){
                        $file = $optImg->getClientOriginalName();
                        // $filename = 'opt_'.time().'.'.$optImg->extension();
                        $optImg->move(public_path('uploads/opt-img'), $file);
                        $opt_data = [
                            'opt_img' => $file,
                        ];
                        // $opt_id[] = $request->opt_ids[$key];
                        Option::where('id', $request->opt_ids[$key])->where('que_id', $id)->where('topic_id', $topic_id->topics->id)->update($opt_data);
                    }
                }
                if( $request->multi_choice_0 )
                {
                    Answer::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->delete();
                    foreach( $request->multi_choice_0 as $key => $multi_choice_ans) {
                        $ans_data = [
                            'opt_id' => $multi_choice_ans, 
                            'que_id' => $request->que_id, 
                            'topic_id' => $topic_id->topics->id, 
                        ];
                        Answer::create($ans_data);
                    }
                } else {
                    $ans_data = [
                        'opt_id' => $request->single_choice_0, 
                    ];
                    Answer::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->update($ans_data);
                }
            } else {

                if( $request->multi_choice_0 )
                {
                    Answer::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->delete();
                    foreach( $request->multi_choice_0 as $key => $multi_choice_ans) {
                        $ans_data = [
                            'opt_id' => $multi_choice_ans, 
                            'que_id' => $request->que_id, 
                            'topic_id' => $topic_id->topics->id, 
                        ];
                        Answer::create($ans_data);
                    }
                } else {
                    $ans_data = [
                        'opt_id' => $request->single_choice_0, 
                    ];
                    Answer::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->update($ans_data);
                }
            }
        } else {
            
            foreach( $request->single_choice_ans as $key => $opts ) {
    
                $opt_data = [
                    'option' => $opts,
                ];
                $opt_id = $request->opt_ids[$key];
                Option::where('id', $request->opt_ids[$key])->where('que_id', $id)->where('topic_id', $topic_id->topics->id)->update($opt_data);
            }
            
            if( $request->multi_choice_0 )
            {
                Answer::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->delete();
                foreach( $request->multi_choice_0 as $key => $multi_choice_ans) {
                    $ans_data = [
                        'opt_id' => $multi_choice_ans, 
                        'que_id' => $request->que_id, 
                        'topic_id' => $topic_id->topics->id, 
                    ];
                    Answer::create($ans_data);
                }
            } else {
                $ans_data = [
                    'opt_id' => $request->single_choice_0, 
                ];
                Answer::where('que_id', $id)->where('topic_id', $topic_id->topics->id)->update($ans_data);
            }
        }
        
        return redirect()->route('questions.index')->with('success','Options updated sucessfully!');
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


    public function getQuestions(Request $request) {

        $search = trim($request->search);
        $response = [];

        if( $search == '' ) {
            $questions = Question::orderBy('question','desc')
            ->select('id','question')
            ->limt(5)
            ->get();
        } else {
            $questions = Question::select('id','question')
            ->where('question', 'LIKE', '%'.$search.'%')
            ->get();
        }
        foreach($questions as $question) {
            $response[] = array(
                'id' => $question->id,
                'question' => $question->question
            );
        }
        return response()->json($response); 

    }
}
