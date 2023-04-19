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

        try {

            DB::table('password_resets')->insert([
                'email' => $request->input('email'),
                'token' => $token,
                'created_at' =>Carbon::now()
            ]);


            Mail::send('email.forgotPassword', ['token' => $token], function($message) use ($request) {
                $message->to($request->input('email'));
                $message->subject('Reset Password');
            });

            return back()->with('message', 'Password Reset link sent');

        } catch (Exception $e) {

            $errorMessage = 'Failed' . $e->getMessage();
            echo $errorMessage;

        }

    }
    public function showReset($token){

        return view('auth.ForgotPasswordLink',compact('token'));

        // $url = route('showReset', ['token' => $token]);
    }

    public function submitReset(Request $request){

        try {
            $request->validate([
                'email' => 'required|email|exists:users',
                'password'=>'required|min:6|confirmed',
                'password_confirmation' => 'required'
            ]);
        }catch (Exception $e) {

            $errorMessage = 'Failed' . $e->getMessage();
            echo $errorMessage;

        }

        $password_reset_request = DB::table('password_resets')
        ->where('email',$request->input('email'))
        ->where('token',$request->token)
        ->first();


       if(!$password_reset_request){
             return back()->with('errorr','invalid Token!');
       }

        //   User::where('email',$request->input('email'))
        //   ->update(['password'=>$request->input('password')]);

        // DB::update('update users set password=? where email=?',[$request->input('password'),$request->input('email')]);


        $password = $request->input('password');


        $passwordHash = password_hash($password, PASSWORD_DEFAULT);


        DB::update('update users set password=? where email=?', [$passwordHash, $request->input('email')]);



        DB::table('password_resets')->where('email',$request->input('email'))->delete();



        return back()->with('message',"Your password has been changed");



    }
}
