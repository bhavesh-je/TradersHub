<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cources;
use App\Models\CourseCategories;
use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Display courses as per user's packges
        if( Auth::user() ) {
            
            if( Auth::user()->hasRole(3) ) { //For Basic package user
                $courses = Cources::where('course_subscription', 3)->orderBy('id', 'DESC')->get();
            } else if( Auth::user()->hasRole(4) ) { //For Master package user
                $courses = Cources::where('course_subscription', 1)->orderBy('id', 'DESC')->get();
            } else if( Auth::user()->hasRole(5) ) { //For Standard package user
                $courses = Cources::where('course_subscription', 2)->orderBy('id', 'DESC')->get();
            } else {
                $courses = Cources::orderBy('id', 'DESC')->get();
            }

            return Inertia::render('Courses', ['cources' => $courses]);

        } else {
            return Inertia::render('Welcome');
        }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $view_courses = Cources::with('CourseTopics')->where('id', $id)->firstOrFail();
        $cat_id = json_decode($view_courses->cat_id);
        $categories = CourseCategories::whereIn('id', $cat_id)
        ->orderBy('created_at', 'DESC')->get();
        $course_cat = array();
        foreach( $categories as $key => $category )
        {   
            $course_cat[$category->id] = $category->c_c_name;
        }
        $course_cats = implode(', ', $course_cat);
        // $i = ($request->input('page', 1) - 1) * 5;
        return Inertia::render('ViewCourse', ['view_cources' => $view_courses,'course_cat'=>$course_cats]);
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
