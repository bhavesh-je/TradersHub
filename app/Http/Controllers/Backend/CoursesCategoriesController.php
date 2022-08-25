<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CourseCategories;

class CoursesCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('role:Admin');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $CourseCategories = CourseCategories::orderBy('created_at', 'DESC')->get();
        return view('Backend.LMS.course-categories.index', compact('CourseCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $C_cats = CourseCategories::orderBy('created_at', 'DESC')->get();
        return view('Backend.LMS.course-categories.create', compact('C_cats'));
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
        $validate = $this->validate($request,[
            'c_c_name' => 'required|max:250',
            'description' => 'nullable',
            'parent' => 'nullable',
        ]);
        CourseCategories::create($validate);
        return redirect()->route('course-category.index')->with('success', 'Course category create successfully.');
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
        $EditCourseCat = CourseCategories::findOrFail($id);
        $C_cats = CourseCategories::orderBy('created_at', 'DESC')->get();
        return view('Backend.LMS.course-categories.edit', compact('EditCourseCat', 'C_cats'));
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
        $validate = $this->validate($request,[
            'c_c_name' => 'required|max:250',
            'description' => 'nullable',
            'parent' => 'nullable',
        ]);
        CourseCategories::where('id', $id)->update($validate);
        return redirect()->route('course-category.index')->with('success', 'Course category update successfully.');
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
        CourseCategories::where('id', $id)->delete();
        return redirect()->route('course-category.index')->with('success', 'Course category deleted successfully.');
    }
}
