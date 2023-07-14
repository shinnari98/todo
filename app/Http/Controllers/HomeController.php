<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    // public function index()
    // {
    //     return view('home');
    // }
    public function index()
    {
        // ログインユーザーを取得する
        $user = Auth::user();

        // ログインユーザーに紐づくフォルダを一つ取得する
        if ($user) {
            $folder = $user->folders()->first();
        } else {
            $folder = null;
        }

        // まだ一つもフォルダを作っていなければホームページをレスポンスする
        if (is_null($folder)) {
            return view('home');
        }

        // フォルダがあればそのフォルダのタスク一覧にリダイレクトする
        return redirect()->route('tasks.index', [
            'id' => $folder->id,
        ]);
    }

    /* public function registerForm()
    {
        return view('register');
    }

    public function loginForm()
    {
        return view('login');
    }
    
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        if (Auth::attempt($data)) {
            $user = User::where('email', $data['email'])->first();
            $request->session()->put('user', $user);

            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function register(RegisterRequest $request)
    {
        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('login');
    }
    public function logout()
    {

        Auth::logout();
        return redirect()->route('home');
    } */
}
