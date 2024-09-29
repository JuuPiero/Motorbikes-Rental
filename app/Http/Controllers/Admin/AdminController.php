<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    
    public function index() {
        return view('admin.index');
    }

    public function login() {
        return view('admin.login');
    }

    public function checkLogin(Request $request) {
        $credentials  = $request->only('email', 'password');
        $remember = !empty($request->only('remember'));

        if(Auth::guard('admin')->attempt($credentials, $remember)) {
            return redirect(route('admin'));
        }
        
        return back()->withErrors([
            'error' => 'Thông tin đăng nhập không hợp lệ.',
        ]);
    }

    public function logout() {
        Auth::guard('admin')->logout();
        return redirect(route('admin.login'));
    }

}
