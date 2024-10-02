<?php

namespace App\Http\Controllers\User;

use App\Extensions\Motorbike\MotorbikeStatus;
use App\Extensions\Rental\RentalStatus;
use App\Http\Controllers\Controller;
use App\Models\Motorbike;
use App\Models\Rental;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {
    public function index() {
        $motorbikes = Motorbike::
        where('status', MotorbikeStatus::AVAILABLE)->
        orderByDesc('updated_at')->paginate(10);
        $brandCount = Motorbike::distinct('brand')->get('brand')->count();
        $motorbikedCount = Motorbike::all()->count();
        $userCount = User::all()->count();


        return view('client.home.index')->with([
            'motorbikes' => $motorbikes,
            'brandCount' => $brandCount,
            'motorbikedCount' => $motorbikedCount,
            'userCount' => $userCount,
        ]);
    }


    public function search(Request $request) {
        $motorbikes = Motorbike::
        where('status', MotorbikeStatus::AVAILABLE)
        ->where('model', 'LIKE', '%' . $request->keywords . '%')
        ->orderByDesc('updated_at')
        ->paginate(10);
        
        return view('client.motorbike.index')->with([
            'motorbikes' => $motorbikes,
            
        ]);
    }

    public function motorbikes() {
        // $motorbike = Motorbike::findOrFail($id);
        $motorbikes = Motorbike::
        where('status', MotorbikeStatus::AVAILABLE)
        ->orderByDesc('updated_at')->paginate(10);

       

        return view('client.motorbike.index')->with([
            'motorbikes' => $motorbikes
        ]);
    }
    public function motorbikeDetail($id) {
        $motorbike = Motorbike::findOrFail($id);
       
        $suggests = Motorbike::
        where('id', '!=', $id)
        ->where('status', MotorbikeStatus::AVAILABLE)
        ->where('brand', $motorbike->brand)

        ->orderByDesc('updated_at')->paginate(10);
       
        return view('client.motorbike.detail')->with([
            'motorbike' => $motorbike,
            'suggests' => $suggests
        ]);
    }

    public function createRental($bikeId) {
        $motorbike = Motorbike::findOrFail($bikeId);
        return view('client.rental.create')->with([
            'motorbike' => $motorbike
        ]);
    }


    public function about() {
        return view('client.home.about');
    }
}
