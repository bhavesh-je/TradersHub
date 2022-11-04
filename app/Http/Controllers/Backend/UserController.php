<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function index(Request $request)
    {
        // whereHas("roles", function($q){ $q->whereNotIn("name", ["Admin"]); })->
        $data = User::whereHas("roles", function($q){ $q->whereNotIn("name", ["Admin"]); })->orderBy('id','DESC')->get();
        return view('Backend.users.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::Where('id','!=', 1)->pluck('name','name')->all();
        return view('Backend.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'confirm-password' => 'required|same:password',
            'roles' => 'required',
            'details' => 'required'
        ]);

        // $input = $request->all();
        // $input['password'] = Hash::make($input['password']);
        
        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'location' => $request->country.",". $request->region.",". $request->city,
            'portfolio_website_url' => $request->weburl,
            'details' => $request->details,
        ];
        if ($request->file('profile_img') != null) {
            $file = $request->file('profile_img');
            $filename = str_replace(" ","_",$request->name).'_' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/users-profile'), $filename);
            $input['profile_img'] = $filename;
        }

        $user = User::create($input);
        $user->assignRole($request->roles);

        return redirect()->route('users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('Backend.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::Where('id', '!=', 1)->pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        
        return view('Backend.users.edit',compact('user','roles','userRole'));
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
        // dd($request);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'nullable|same:confirm-password',
            'confirm-password' => 'nullable|same:password',
            'roles' => 'required',
            'details' => 'required',
        ]);
        if($request->country == null){
            $country = $request->selectedcuntrycode;
            $region = $request->selectedregion;
            $city = $request->selectedcity;
        }else{
            $country = $request->country;
            $region = $request->region;
            $city = $request->city;
        }

        $input = [
            'name' => $request->name,
            'email' => $request->email,
            'location' => $country.",". $region.",". $city,
            'portfolio_website_url' => $request->weburl,
            'details' => $request->details,
        ];

        if(!empty($request->password)){
            $input['password'] = Hash::make($request->password);
        }else{
            $input = Arr::except($input,array('password'));
        }

        if ($request->file('profile_img') != null) {
            $file = $request->file('profile_img');
            $filename = str_replace(" ","_",$request->name).'_' . time() . '.' . $file->extension();
            $file->move(public_path('uploads/users-profile'), $filename);
            $input['profile_img'] = $filename;
        }
        // dd($input);

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
