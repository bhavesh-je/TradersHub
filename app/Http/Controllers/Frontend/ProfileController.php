<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::where('id',Auth::user()->id)->firstOrFail();
        $roleName = $data->getRoleNames();
        return Inertia::render('Profile',['userData'=>$data,'roleName'=>$roleName]);
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
    public function update(Request $request)
    {
        // dd($request->file('profile_img'));
        // $updatePR = User::where('id',$request->id)->update(['name'=>$request->name]);
        // $updatePR = new User();
        $updatePR = [
            "name" => $request->name,
            "email" => $request->email
        ];

        if( $request->file('profile_img') != null ){
            $file = $request->file('profile_img');
            $filename = str_replace(" ","_",$request->name).'_'.time().'.'.$file->extension();
            // $file->move(public_path('uploads/users-profile'), $filename);
            $updatePR['profile_img'] = $filename;
        }
        // dd($updatePR);
        User::where('id',$request->id)->update($updatePR);
        // return Inertia::render('Profile',['success'=>"Profile has been Upadated Successfully!"]);
        return response()->json(['success'=>"Profile has been Upadated Successfully!"]);
    }

    public function changePassword(Request $request)
    {
        $checkemail = User::where('email',$request->currentpassword)->firstOrFail();

        
        dd($request);
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
