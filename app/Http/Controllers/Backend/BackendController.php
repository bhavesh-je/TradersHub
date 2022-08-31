<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class BackendController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Redirect to home page if user authenticate
        if( Auth::check() && Auth::user()->hasRole('Admin')){
            return redirect()->route('dashboard.index');
        } else {
            return view('Backend.login.index');
        }
    }

    public function adminLoginForm()
    {
        return view('Backend.login.login_form');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ],
        [
           'email.exists' => 'Entered email : '.$request->email.' is not valid',
        ]);

        $credentials = $request->only('email', 'password');
        $user = User::where('email', $credentials['email'])->firstOrFail();

        $roleId = $user->roles->pluck('id')[0];

        if( $roleId == 1 ) {
            if (Auth::attempt($credentials) ) {
                return redirect()->route('dashboard.index');
            }else{
                return redirect()->route('admin_login')->with('danger', 'Oppes! You have entered invalid credentials');
            }
        } else {
            return redirect()->route('admin_login')->with('danger', 'Oppes! You have entered invalid credentials');
        }

        // if (Auth::attempt($credentials) ) {
        //     if( Auth::user()->hasRole('Admin') ){

        //         return redirect()->route('dashboard.index');
        //     } else {
        //         return redirect()->route('admin_login')->with('danger', 'Oppes! You have entered invalid credentials');        
        //     }
        // } 
        // return redirect()->route('admin_login')->with('danger', 'Oppes! You have entered invalid credentials');

    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect()->route('admin_login');
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
