<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motorbike;
use App\Models\Rating;
use App\Models\User;
use App\Repositories\Order\OrderRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {
    // private $orderRepository;

    // public function __construct(OrderRepository $orderRepository) {
    //     $this->orderRepository = $orderRepository;
    // }
    public function login() {
        return view('client.user.login');
    }

    public function checkLogin(Request $request) {
        $credentials  = $request->only('email', 'password');
        $remember = !empty($request->only('remember'));
        if(Auth::attempt($credentials, $remember)) {
            return redirect(route('home'));
        }
        return back()->withErrors([
            'error' => 'Thông tin đăng nhập không hợp lệ.',
        ]);
    }

    public function register() {
        return view('client.user.register');
    }
    public function postRegister(Request $request) {

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);
        Auth::login($user);
        return redirect(route('home'));
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('user.login');
    }

   

    // public function profile() {
    //     $user = Auth::user();
    //     return view('client.user.profile')->with([
    //         'user' => $user,
    //     ]);
    // }
    // public function updateProfie(Request $request) {
    //     $credentials  = $request->only('email', 'password');

    //     if(Auth::attempt($credentials)) {
    //         $user = User::find(Auth::user()->id);
    //         $data = $request->all();
    //         if($data['new_password']) {
    //             $data['password'] = Hash::make($data['new_password']);
    //         }

    //         $user->update($data);

    //         return redirect()->back()->with([
    //             'message' => 'Cập nhật thành công'
    //         ]);
    //     }
    //     return redirect()->back()->with([
    //         'message' => 'Sai mật khẩu'
    //     ]);
        
    // }

    // public function purchase() {
    //     // $orders = $this->orderRepository->allOrderOfUser(Auth::user()->id);
    //     $orders = Auth::user()->orders()->paginate(8);
    //     // $user = A
    //     // dd(Auth::user());


    //     return view('client.user.purchase')->with([
    //         'orders' => $orders,
    //     ]);
    // }



    // public function createRating(Request $request) {
    //     $data = $request->all();
    //     $data['user_id'] = Auth::user()->id;
    //     Rating::create($data);

    //     return response()->json([
    //         'message' => 'Đã thêm đánh giá'
    //     ]);
    // }
}
