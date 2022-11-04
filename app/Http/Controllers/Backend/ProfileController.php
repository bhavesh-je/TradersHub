<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::where('id', Auth::user()->id)->firstOrFail();
        $roleName = $data->getRoleNames();
        // dd($data);
        return view('Backend.profile',compact('data','roleName'));
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
        $newpassword = '';
        if($request->newpassword != null){
            $validate = $request->validate([ 
                "newpassword" => 'string|min:6|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/|confirmed',
            ]);
        }
        
        // dd($request->all());    
        if($request->country == null){
            $country = $request->selectedcuntrycode;
            $region = $request->selectedregion;
            $city = $request->selectedcity;
        }else{
            $country = $request->country;
            $region = $request->region;
            $city = $request->city;
        }
        $updatePR = [
            "name" => $request->name,
            "email" => $request->email,
            'location' => $country.",". $region.",". $city,
            "portfolio_website_url" => $request->weburl,
            "details" => $request->details,
        ];
        if( $request->file('profile_img') != null ){
            $file = $request->file('profile_img');
            $filename = str_replace(" ","_",$request->name).'_'.time().'.'.$file->extension();
            $file->move(public_path('uploads/users-profile'), $filename);
            $updatePR['profile_img'] = $filename;
        }
        
        // User::where('id',$request->id)->update($updatePR);
        
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
