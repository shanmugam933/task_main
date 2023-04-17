<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use App\Models\User;

class ForgotPasswordController extends Controller
{
    public function showForgot(){
        return view('auth.ForgotPassword');
    }
    public function submitForgot(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->input('email'),
            'token' => $token,
            'created_at' =>Carbon::now()
        ]);
        try {
            Mail::send('email.forgotPassword', ['token' => $token], function($message) use ($request) {
                $message->to($request->input('email'));
                $message->subject('Reset Password');
            });
            return back()->with('message', 'We have emailed you reset password link');
        } catch (\Exception $e) {
            // Handle the exception and assign error message to $e variable
            $errorMessage = 'Failed to send reset password link. Error: ' . $e->getMessage();
            echo $errorMessage;
            // You can also log the error, return an error response, etc.
        }
         
    }
    public function showReset($token){

        return view('auth.ForgotPasswordLink', ['token' => $token]);
        // $url = route('showReset', ['token' => $token]);
    }

    public function submitReset(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
            'password'=>'required|min:6|confrimed',
            'password_confrimation' =>'required'
        ]);

        $password_reset_request = DB::table('password_resets')->where('email',$request->input('email'))
        ->where('token',$request->token)
        ->first();
    
       if(!$password_reset_request){
            return back()->with('errorr','invalid Token!');
       }else{
          User::where('email',$request->input('email'))
          ->update(['password'=>Hash::make($request->input('password'))]);

        DB::table()->where('email',$request->input('email'))->delete();

        return redirect('/')->with('message',"Your password has been changed");

       }

    }
}
