<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required|min:8',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'address' => 'required',
            'birthday' => 'required|date',
            'email' => 'required|email',
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);
        return redirect(route('login'))->with('success', 'Register Success');
    }

    public function checkLogin(Request $request)
    {
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($data)) {
            $user = auth()->user();
            $request->session()->regenerate();

            if ($user->isAdmin()) {
                return redirect()->intended(route('library.dashboard'))->with('success', 'Login Success');
            } else {
                return redirect()->intended(route('library.book'))->with('success', 'Login Success');
            }
        }

        return back()->withErrors([
            'username' => 'The username or password is incorrect',
        ]);
    }

    public function logout(Request $request)
    {
        auth()->guard()->logout();
        $request->session()->invalidate();

        return redirect('login');
    }
}
