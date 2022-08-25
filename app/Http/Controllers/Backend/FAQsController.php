<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use Illuminate\Support\Facades\Auth;

class FAQsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = FAQ::orderBy('id', 'DESC')->get();
        return view('Backend.faq.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.faq.create');
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
        $this->validate($request, [
            'question' => 'required|min:3|max:255',
            'answer' => 'required|min:5|max:1500',
        ]);

        $faq = [
            'question' => $request->question,
            'answer' => $request->answer,
            'created_by' => Auth::user()->id,
        ];

        FAQ::create($faq);
        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
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
        $faq = FAQ::findOrFail($id);
        dd($faq);
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
        $faq = FAQ::findOrFail($id);
        return view('Backend.faq.edit')->with('faq', $faq);
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
        $this->validate($request, [
            'question' => 'required|min:3|max:255',
            'answer' => 'required|min:5|max:1500',
        ]);

        $faq = [
            'question' => $request->question,
            'answer' => $request->answer,
            'updated_by' => Auth::user()->id,
        ];

        FAQ::where('id', $id)->update($faq);
        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
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

        $faq = FAQ::where('id', $id)->delete();
        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
