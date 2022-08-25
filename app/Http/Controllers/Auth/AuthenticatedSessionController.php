<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {

        $user = User::where('email', $request->email)->get();
        
        if( count($user) > 0  ) {
            $roleId = $user[0]->roles->pluck('id')[0];

            if( $roleId != 1 ) {
                $request->authenticate();
                $request->session()->regenerate();
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                return Inertia::render('Auth/Login', ['errors' => array("Oppes! You have entered invalid credentials")]);
            }
        } else {
            return Inertia::render('Auth/Login', ['errors' => array("Oppes! You have entered invalid credentials")]);
        }
        // Rediredt to dashboad if user role is admin
        // if($request->user()->hasRole('Admin')){
        //     return redirect()->route('dashboard.index');
        // }
        // else{
        //     return redirect()->intended(RouteServiceProvider::HOME);
        //     // return redirect(RouteServiceProvider::HOME);
        // }

    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

     /**
     * Automaticlly logged in from wordpress to laravel
     *
     * @param  $_GET
     * @return \Illuminate\Http\RedirectResponse
     */
    public function autoLoggedin(){
        if( isset($_GET['detail']) ){
            $email = base64_decode(urldecode($_GET['detail']));

            $checkUser = User::where('email', $email)->first();

            if( $checkUser ) {

                $user_login = Auth::login($checkUser);

                return redirect()->intended(RouteServiceProvider::HOME);

            } else {

                // Get wordpress user with membership level
                $Wpuser = DB::connection('mysql2')->select( "SELECT wp_users.*, wp_pmpro_memberships_users.membership_id FROM wp_users JOIN wp_pmpro_memberships_users ON wp_users.id = wp_pmpro_memberships_users.user_id WHERE wp_users.user_email = '".$email."'" );
                
                // Create user in laravel Traders Hub
                $user = User::create([
                    'name' => $Wpuser[0]->user_login,
                    'email' => $Wpuser[0]->user_email,
                    'password' => Hash::make($Wpuser[0]->user_login),
                ]);
                
                // Check Wordpress User Membership Level and assign role in Traders Hub
                switch ($Wpuser[0]->membership_id) {
                    case 1: //Master pacakge
                        $user->assignRole([4]);
                        break;
                    case 2: //Standard pacakge
                        $user->assignRole([5]);
                        break;    
                    case 3: //Basic pacakge
                        $user->assignRole([3]);
                        break;    
                    default:
                        $user->assignRole([2]);
                        break;
                }

                // Make user login
                $user_login = Auth::login($user);

                return redirect()->intended(RouteServiceProvider::HOME);
            }

            // $pwd = base64_decode(urldecode($_GET['pwd']));
            // $user = User::where('email',$email)->first();
            // $user_login = Auth::login($user);
            // return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Redirect to home page if user authenticate
        if( Auth::check() ){
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
}
