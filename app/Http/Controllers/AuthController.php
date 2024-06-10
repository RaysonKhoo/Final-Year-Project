<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Parcel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Mail\AuthMail;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller
{
     function index()
    {
        return view('auth_page/login');
    }
    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'Email Must Be Fill In',
            'password.required' => 'password Must Be Fill In',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        $remember = $request->input('remember_me');
        if(Auth::attempt($infologin, $remember))
        {
            if (Auth::user()->email_verified_at != null)
            {
                if(Auth::user()->role === 'staff')
                {
                    return redirect()->route('staff')->with('success','Hello Staff, Welcome To Use Our System!');
                }
                else if(Auth::user()->role === 'user')
                {
                    return redirect()->route('user')->with('success','Hello User, Welcome To Use Our System!');
                }
            }
            else
            {
                Auth::logout();
                return redirect()->route('auth')->withErrors('Account not yet verify. please verify your account first.');
            }
        }
        else
        {
            return redirect()->route('auth')->withErrors('Email or Password Wrong!');
        }
    }
    function create()
    {
        return view('auth_page/register');
    }
    function register(Request $request)
    {
        $str = Str::random(100);// use to generating unique tokens and verification code
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed',// Using  "confirmed" validation

        ], [
            'name.required' => 'Full Name Must Be Fill In',
            'name.min' => 'Full Name Minimum 5 Character',
            'email.required' => 'Email Must Be Fill In',
            'email.unique' => 'Email Has Been Use For Register',
            'password.required' => 'Password Must Be Fill In',
            'password.min' => 'Password Minimun 6 Character',
            'password.confirmed' => 'Passwords do not match', // Validation message for confirmed rule

        ]);

        $inforegister = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash the password
            'verify_key' => $str,
        ];

        User::create($inforegister);

        $details = [
            'name'=>$inforegister['name'],
            'role'=>'user',
            'datetime'=> date('Y-m-d H:i:s'),
            'website'=>'Hostel Parcel Management System',
            'url'=>'http://'.request()->getHttpHost()."/"."verify/".$inforegister['verify_key'],
            //'url' => route('verification.verify', ['key' => $inforegister['verify_key']]),
        ];

        Mail::to($inforegister['email'])->send(new AuthMail($details));

        return redirect()->route('auth')->with('success','Link verify email has been send to your mailbox. please check your mailbox to verify your account.');
    }
    function verify($verify_key)
    {
        $keyCheck = User::select('verify_key')->where('verify_key',$verify_key)->exists();
        if($keyCheck)
        {
            $user = User::where('verify_key',$verify_key)->update(['email_verified_at' => date('Y-m-d H:i:s')]);
            return redirect()->route('auth')->with('success','verify success. your account has been active now.');
        }
        else
        {
            return redirect()->route('auth')->withErrors('keys is not valid. Please makesure your key is entered correct!')->withInput();
        }
    }
    function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    function forgotpasswordview()
    {
        return view('mail.forgotpassword');
    }
    function forgotpasswordrequest(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
        ]);
        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('mail.resetpassword', ['token' => $token], function ($message) use ($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('password.request'))->with("status", "We have send an email to reset password.");
    }

    function forgotpasswordreset($token)
    {
        return view('mail.newpassword', compact('token'));
    }

    function passwordresetsave(Request $request)
    {
        $request->validate([
            'email' => "required|email|exists:users",
            'password'=> "required|string|min:6|confirmed",
            'password_confirmation'=> "required" //Use 'password_confirmation' here
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            'email' =>$request->email,
            'token' =>$request->token
        ])->first();

        if(!$updatePassword)
        {
            return redirect()->to (route('password.reset'))->with("error", "invalid");
        }

        User::where("email", $request->email)->update(["password" => Hash::make($request->password)]);
        DB::table('password_reset_tokens')->where(["email" => $request->email])->delete();

        return redirect()->to (route('auth'))->with("success", "Password reset success");
        }


}
