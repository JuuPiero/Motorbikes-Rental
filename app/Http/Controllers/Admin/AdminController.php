<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Motorbike;
use App\Models\Rating;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller {
    
    public function index() {
        $motorbikeCount = Motorbike::all()->count();
        $userCount = User::all()->count();
        $ratingCount = Rating::all()->count();
        $rentalCount = Rental::all()->count();
       
        return view('admin.index')->with([
            'motorbikeCount' => $motorbikeCount,
            'userCount' => $userCount,
            'ratingCount' => $ratingCount,
            'rentalCount' => $rentalCount,
        ]);
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

    public function search(Request $request) {
        $motorbikes = Motorbike::
        // where('status', 'Available')
        where('model', 'LIKE', '%' . $request->keywords . '%')
        ->orderByDesc('updated_at')
        ->paginate(10);
        
        return view('admin.result')->with([
            'motorbikes' => $motorbikes
        ]);
    }

}
