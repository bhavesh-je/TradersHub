<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Cources;
use Illuminate\Http\Request;
use App\Models\CourseCategories;
use Carbon\Carbon;
use Thumbnail;
use FFMpeg;
use FFMpeg\Filters\Video\VideoFilters;
use ProtoneMedia\LaravelFFMpeg\Filters\WatermarkFactory;

class CourcesController extends Controller
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
        $courses = Cources::orderBy('created_at', 'DESC')->get();
        $categories = CourseCategories::orderBy('created_at', 'DESC')->get();
        return view('Backend.LMS.courses.index', compact('courses', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = CourseCategories::whereNull('parent')
        ->with('childrenCourseCategories')
        ->orderBy('created_at', 'DESC')->get();
        return view('Backend.LMS.courses.create', compact('categories'));
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
            'course_name' => 'required|max:250',
            'course_content' => 'nullable',
            'course_video_link' => 'nullable',
            'course_price' => 'nullable|numeric|min:1',
            'course_sale_price' => 'nullable|numeric|min:1',
            'expiration' => 'in:0,1',
            'course_expiration_day' => 'nullable|numeric|min:1',
        ]);

        $cat_ids;
        if( !empty($request->cat_id) ){
            $cat_ids = json_encode($request->cat_id);
        } else {
            $cat_ids = NULL;
        }
        
        $course = [
            'course_name' => $request->course_name,
            'course_content' => $request->course_content,
            'course_video_link' => $request->course_video_link,
            'course_price' => $request->course_price,
            'course_sale_price' => $request->course_sale_price,
            'course_expiration_day' => $request->course_expiration_day,
            'expiration' => $request->expiration? 1 : 0 ?? 0,
            'cat_id' => $cat_ids,
            'course_subscription' => $request->course_subscription,
        ];
        // $thumbnail_path   = storage_path().'/images';
        // $video_path       = $request->course_video_link;
        // $thumbnail_image  = $request->course_name.".jpg";
        // $thumbnail_status = Thumbnail::getThumbnail($video_path,$thumbnail_path,$thumbnail_image);

        // $course_vd = explode('/',$request->course_video_link);
        // $course_vd = $course_vd[4];
        // $video_link = 'https://www.youtube.com/watch?v='.$course_vd;
        // $destination_path = storage_path().'/uploads';
        // $thumbnail_path   = storage_path().'/imgs';
        // $thumbnail_image  = "testing.jpg";
        // $time_to_image    = floor(15.0/2);
        // $thumb = Thumbnail::getThumbnail($video_link,$thumbnail_path,$thumbnail_image,$time_to_image);
        // $start = \FFMpeg\Coordinate\TimeCode::fromSeconds(5);
        // $clipFilter = new \FFMpeg\Filters\Video\ClipFilter($start);
        
        // $thumb = FFMpeg::open($video_link)
        // ->addFilter($clipFilter)
        // ->addWatermark(function(WatermarkFactory $watermark) {
        //     $watermark->open('logo.png')
        //         ->horizontalAlignment(WatermarkFactory::LEFT, 25)
        //         ->verticalAlignment(WatermarkFactory::TOP, 25);
        // });
        // dd($thumb);
        Cources::create($course);
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cources  $cources
     * @return \Illuminate\Http\Response
     */
    public function show(Cources $cources, $id)
    {
        //
        $course = Cources::findOrFail($id);
        $cat_id = json_decode($course->cat_id);
        
        $course_cat = array();
        if( !empty($cat_id) && $cat_id != "null") {
            $categories = CourseCategories::whereIn('id', $cat_id)->orderBy('created_at', 'DESC')->get();

            foreach( $categories as $key => $category )
            {   
                $course_cat[$category->id] = $category->c_c_name;
            }
        }

        return view('Backend.LMS.courses.show', compact('course', 'course_cat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cources  $cources
     * @return \Illuminate\Http\Response
     */
    public function edit(Cources $cources, $id)
    {
        //
        $categories = CourseCategories::whereNull('parent')
        ->with('childrenCourseCategories')
        ->orderBy('created_at', 'DESC')->get();
        $course = Cources::findOrFail($id);
        return view('Backend.LMS.courses.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cources  $cources
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cources $cources, $id)
    {
        //
         $validate = $this->validate($request,[
            'course_name' => 'required|max:250',
            'course_content' => 'nullable',
            'course_video_link' => 'nullable',
            'course_price' => 'nullable|numeric|min:1',
            'course_sale_price' => 'nullable|numeric|min:1',
            'course_expiration_day' => 'nullable|numeric|min:1',
            'expiration' => 'in:0,1',
            'cat_id' => 'nullable'
        ]);
        Cources::where('id', $id)->update(['cat_id' =>NULL]);

        $Updatecourse = [
            'course_name' => $request->course_name,
            'course_content' => $request->course_content,
            'course_video_link' => $request->course_video_link,
            'course_price' => $request->course_price,
            'course_sale_price' => $request->course_sale_price,
            'expiration' => $request->expiration? 1 : 0 ?? 0,
            'cat_id' => json_encode($request->cat_id),
            'course_subscription' => $request->course_subscription,
        ];

        if( $request->course_expiration_day != '' ){
            $Updatecourse['course_expiration_day'] = $request->course_expiration_day;
        }

        if( $request->course_expiration_day != '' ){
            $Updatecourse['course_expiration_day'] = $request->expiration;
        }

        // dd($Updatecourse);
        Cources::where('id', $id)->update($Updatecourse);
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cources  $cources
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cources $cources, $id)
    {
        //
        Cources::where('id', $id)->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
