<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Motorbike;
use Illuminate\Http\Request;

class HomeController extends Controller {
    public function index() {
        $motorbikes = Motorbike::orderByDesc('updated_at')->paginate(10);
        return view('client.home.index')->with([
            'motorbikes' => $motorbikes
        ]);
    }
    public function motorbikes() {
        // $motorbike = Motorbike::findOrFail($id);
        $motorbikes = Motorbike::orderByDesc('updated_at')->paginate(10);
        return view('client.motorbike.index')->with([
            // 'motorbike' => $motorbike
        ]);
    }
    public function motorbikeDetail($id) {
        $motorbike = Motorbike::findOrFail($id);
        return view('client.motorbike.detail')->with([
            'motorbike' => $motorbike
        ]);
    }

    public function createRental($bikeId) {
        $motorbike = Motorbike::findOrFail($bikeId);
        return view('client.rental.create')->with([
            'motorbike' => $motorbike
        ]);
    }
}
