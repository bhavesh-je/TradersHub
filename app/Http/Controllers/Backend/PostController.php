<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $listPostData = Post::orderBy('id','DESC')->get();
        return view('Backend.Posts.index',compact('listPostData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Backend.Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request,$request->file('post_image'));
        $this->validate($request,[
            'post_title' => 'required',
            'post_content' => 'required',
        ]);

        $storePostData = new Post();
        if( $request->file('post_image') != null ){
            $file = $request->file('post_image');
            $filename = $request->post_title.'_'.time().'.'.$file->extension();
            $file-> move(public_path('uploads/post-img/'), $filename);
            $storePostData->post_image = $filename;
        }
        $storePostData->post_author = Auth::user()->id;
        $storePostData->post_title = $request->post_title;
        $storePostData->post_content = $request->post_content;
        if($request->post_status){
            $storePostData->post_status =$request->post_status;
        }else{
            $storePostData->post_status = 0;
        }
        $storePostData->save();

        return redirect()->route('posts.index')->with('success', 'Post has been created successfully.');
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
        $editData = Post::where('id',$id)->first();
        // dd($editData);
        return view('Backend.Posts.edit',['editData'=>$editData]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // dd($request);
        $this->validate($request,[
            'post_title' => 'required',
            'post_content' => 'required',
        ]);
        $updateData = Post::where('id',$request->id)->first();
        if( $request->file('post_image') != null ){
            $file = $request->file('post_image');
            $filename = $request->post_title.'_'.time().'.'.$file->extension();
            $file-> move(public_path('uploads/post-img/'), $filename);
            $updateData->post_image = $filename;
        }
        $updateData->post_author = Auth::user()->id;
        $updateData->post_title = $request->post_title;
        $updateData->post_content = $request->post_content;
        $updateData->post_status = $request->post_status;
        $updateData->update();

        return redirect()->route('posts.index')->with('success', 'Post has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $deleteData = Post::where('id',$id)->delete();
        return redirect()->route('posts.index')->with('success', 'Post has been deleted successfully.');
    }
}
