<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\Question;
use App\Models\Answer;
use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class QuestionControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $value = session('option_id');
        // dd($value);
        $questions = Question::with('topics')->orderBy('id', 'DESC')->get();
        return view('Backend.Quiz.Questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $topics = Topic::all();
        $questions = Question::where('topic_id', 1)->count();
        return view('Backend.Quiz.Questions.create', compact('topics', 'questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            'topic_id' => 'required',
            'question' => 'required|max:250',
            'que_img' => 'nullable|mimes:jpeg,png,jpg|max:2048',
            'que_type' => 'required',
        ]);

        $createQuestion = [
            'topic_id' => $request->topic_id,
            'que_type' => $request->que_type,
            'opt_img' => $request->opt_img ? 1 : 0 ?? 0,
            'question' => $request->question,
        ];

        // dd($createQuestion);

        if ($request->file('que_img') != null) {
            $file = $request->file('que_img');
            $filename = 'que_' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/que-img'), $filename);
            $createQuestion['que_img'] = $filename;
            // $items->image = $filename;
        }

        Question::create($createQuestion);
        return redirect()->route('questions.index')->with('success', 'Question created successfully');
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
        $question = Question::with(['topics', 'options', 'answer'])->where('id', $id)->firstOrFail();
        // dd($question);
        return view('Backend.Quiz.Questions.show', compact('question'));
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
        $topics = Topic::all();
        $question = Question::with('topics')->findOrFail($id);
        return view('Backend.Quiz.Questions.edit', compact('question', 'topics'));
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
        $validate = $this->validate($request, [
            'topic_id' => 'required',
            'question' => 'required|max:250',
            'que_img' => 'nullable|mimes:jpeg,png,jpg|max:2048'
        ]);

        $updateQuestion = [
            'topic_id' => $request->topic_id,
            'que_type' => $request->que_type,
            'opt_img' => $request->opt_img ? 1 : 0 ?? 0,
            'question' => $request->question,
        ];
        // $topic_name = 
        if ($request->file('que_img') != null) {
            $file = $request->file('que_img');
            $filename = 'que_' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/que-img'), $filename);
            $updateQuestion['que_img'] = $filename;
        }

        Question::where('id', $id)->update($updateQuestion);

        return redirect()->route('questions.index')->with('success', 'Question updated successfully');
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
        $question = Question::with('topics')->findOrFail($id);
        $topic_id = $question->topics->id;
        $opts = Option::where('que_id', $id)->where('topic_id', $topic_id)->get();
        foreach ($opts as $key => $opt) {
            $answer = Answer::where('opt_id', $opt->id)->where('que_id', $id)->where('topic_id', $topic_id)->get();
            if (count($answer) > 0) {
                Answer::where('opt_id', $opt->id)->delete();
            }
            Option::where('id', $opt->id)->delete();
        }
        Question::where('id', $id)->delete();
        // $ans = Option::with('answers')->where('que_id', $id)->where('topic_id', $topic_id)->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully.');
    }

    public function getTopics(Request $request)
    {
        // dd($request);
        // if($request->ajax()){
        $search = trim($request->search);
        $response = [];

        if ($search == '') {
            $topics = Topic::orderBy('topic_name', 'desc')
                ->select('id', 'topic_name')
                ->limt(5)
                ->get();
        } else {
            $topics = Topic::select('id', 'topic_name')
                ->where('topic_name', 'LIKE', '%' . $search . '%')
                ->get();
        }
        foreach ($topics as $topic) {
            $response[] = array(
                'id' => $topic->id,
                'topic_name' => $topic->topic_name
            );
        }
        return response()->json($response);
        // }
    }
}