<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function showForgotForm() {
        return view('auth.passwords.email');
    }

    public function SendResetLink(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);
        $validator->setAttributeNames([
            'email' => 'メールアドレス',
        ]);
        $validator->validate();

        $token = \Str::random(64);
        $has_exist = DB::table('password_resets')->where('email',$request->email)->first();
        if ($has_exist) {
            DB::table('password_resets')->where('email',$request->email)->delete();
        }

        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now(),
        ]);
        
        /* '' password.reset*/
        $action_link = route('reset.password.form',['token'=>$token,'email'=>$request->email]);
        
        $body = "メールに関連付けられたアカウントのパスワードをリセットするリクエストを受け取りました。<br>
        以下のリンクをクリックしてパスワードをリセットできます";
        Mail::send('/mail',['action_link'=>$action_link,'body'=>$body], function($message) use ($request) {
            $message->from('noreply@example.com','Your App Name');
            $message->to($request->email,'Your name')->subject('Reset Password');
        });
        return back()->with('success','リセットリングを送りました。');
    }

    public function showResetForm(Request $request) {
        $token = $request->token;
        $email = $request->email;
        return view('auth.passwords.reset',compact('token','email'));
    }

    public function updateNewPassword(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);
        $validator->setAttributeNames([
            'email' => 'メールアドレス',
            'password' => 'パスワード',
            'password_confirmation' => '確認パスワード',
        ]);
        $validator->validate();

        $user = User::where('email',$request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success','パスワードを変更しました。');
    }
}
