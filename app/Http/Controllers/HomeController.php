<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //all about email verification
    public function verify(EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    }

    public function verify_notice() {
        $auth = Auth::user()->email_verified_at;
        if($auth != null){
            return redirect('/home');
        }
        return view('auth.verify');
    }

    public function verify_resend(Request $request) {
        $request->user()->sendEmailVerificationNotification();
     
        return back()->with('message', 'Verification link sent!');
    }

    // change password methods
    public function changePassView()
    {
        return view('auth.change_password');
    }

    public function updatePass(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|string|confirmed',
        ]);
        if(Hash::check($request->current_password, $user->password))
        {
            $data = array(
                'password' => Hash::make($request->password),
            );
            DB::table('users')->where('id',Auth::id())->update($data);
            Auth::logout();
            return redirect('/login')->with('success','Password Changed Successfully!');
        }
        return redirect()->back()->with('error','Current Password Mismacthed!');

    }
}
