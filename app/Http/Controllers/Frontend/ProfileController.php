<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class ProfileController extends Controller
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
      
        // $updatePR = User::where('id',$request->id)->update(['name'=>$request->name]);
        // $updatePR = new User();
        // dd($request->file('profile_img'));
        
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

        if($request->newpassword != null){
            if($request->confirmed != null){
                $newpassword = Hash::make($request->newpassword);
                if($request->newpassword === $request->confirmed){
                    User::where('id',$request->id)->update(['password'=>$newpassword]);
                    return response()->json(['succes'=>"Your password has been updated successfully!"]);
                } else {
                    return response()->json(['errors'=>["confirmed"=> "Your new password or confirmed password is not matched!"]]);
                }
            }else{
                return response()->json(['errors'=>["confirmed"=> "please enter your confirmed password!"]]);
            }
        }
        
        if( $request->file('profile_img') != null ){
            $file = $request->file('profile_img');
            $filename = str_replace(" ","_",$request->name).'_'.time().'.'.$file->extension();
            $file->move(public_path('uploads/users-profile'), $filename);
            $updatePR['profile_img'] = $filename;
        }

        // dd($updatePR);
        User::where('id',$request->id)->update($updatePR);
        return response()->json(['success'=>"Profile has been Upadated Successfully!"]);
    }

    public function changePassword(Request $request)
    {
        // $pass = Hash::make()
        $checkemail = User::where(['id'=>$request->id])->firstOrFail();
        $checkPass = Hash::check($request->currentpassword, $checkemail->password);
        $newpassword = Hash::make($request->newpassword);
        if($checkPass){    
            if($request->newpassword === $request->confirmed){
                // User::where('id',$request->id)->update(['password'=>$newpassword]);
                return response()->json(['succes'=>array("Your password has been updated successfully!")]);
            } else {
                return response()->json(['errors'=>array("Your new password or confirmed password is not matched!")]);
            }
        } else {
            return response()->json(['errors'=>"Your current password is wrong!"]);
        }
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
