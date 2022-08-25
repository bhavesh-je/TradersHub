<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\VideoPost;

class VideoPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allVideoPosts = VideoPost::orderBy('id', 'desc')->get();
        return view('Backend.VideoPosting.index', compact('allVideoPosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Backend.VideoPosting.create');
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
            'post_name' => 'required|max:255',
            'youtube_video_link' => 'nullable|required_without:post_video_name|regex:~^(?:https?://)?(?:www[.])?(?:youtube[.]com/embed/)([^&]{11})~x',
            'post_video_name' => 'nullable|required_without:youtube_video_link|mimetypes:video/mp4',
        ],[
            'youtube_video_link.regex' => 'Entered link is not valid, eg:https://www.youtube.com/embed/xyz',
            'post_video_name.mimetypes' => 'Please add only video file eg: mp4, 3gpp etc',
            'youtube_video_link.required_without' => 'Youtube link or Video link must not be null, Please select atleast one field',
            'post_video_name.required_without' => 'Video link or Youtube link must not be null, Please select atleast one field',
        ]);

        $video = new VideoPost;
        $video->post_name = $request->post_name;
        $video->youtube_video_link = $request->youtube_video_link;
        $video->created_by = Auth::user()->id;
        if( $request->file('post_video_name') ) {
            $path = $request->file('post_video_name')->store('fu-post-videos', ['disk' =>'fu_video_post']);
            $video->post_video_name = $path;
        }
        $video->save();
        
        return redirect()->route('video-post.index')->with('success', 'Video post created successfully.');
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
        $editVideoPost = VideoPost::where('id', $id)->firstOrFail();

        return view('Backend.VideoPosting.edit', compact('editVideoPost'));
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
            'post_name' => 'required|max:255',
            'youtube_video_link' => 'nullable|required_without:post_video_name|regex:~^(?:https?://)?(?:www[.])?(?:youtube[.]com/embed/)([^&]{11})~x',
            'post_video_name' => 'nullable|required_without:youtube_video_link|mimetypes:video/mp4',
        ],[
            'youtube_video_link.regex' => 'Entered link is not valid, eg:https://www.youtube.com/embed/xyz',
            'post_video_name.mimetypes' => 'Please add only video file eg: mp4, 3gpp etc',
            'youtube_video_link.required_without' => 'Youtube link or Video link must not be null, Please select atleast one field',
            'post_video_name.required_without' => 'Video link or Youtube link must not be null, Please select atleast one field',
        ]);

        $video = VideoPost::find($id);
        if( !empty($request->youtube_video_link) ){
            $video->post_video_name = null;
            $video->save();
        }

        $video->post_name = $request->post_name;
        $video->youtube_video_link = $request->youtube_video_link;
        $video->created_by = Auth::user()->id;
        if( $request->file('post_video_name') ) {
            $path = $request->file('post_video_name')->store('fu-post-videos', ['disk' =>'fu_video_post']);
            $video->youtube_video_link = null;
            $video->post_video_name = $path;
        }
        $video->save();
        
        return redirect()->route('video-post.index')->with('success', 'Video post updated successfully.');
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
        VideoPost::where('id', $id)->delete();
        return redirect()->route('video-post.index')->with('success', 'Video post deleted successfully.');

    }
}
