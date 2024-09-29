<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentalController extends Controller {
    
    public function index() {
        $rentals = Rental::orderByDesc('updated_at')
        ->paginate(10);
        return view('admin.rental.index')->with([
            'rentals' => $rentals
        ]);
    }

    public function detail($id) {
        $rental = Rental::findOrFail($id);
        return view('admin.rental.detail')->with([
            'rental' => $rental
        ]);
    }

    public function update($id, Request $request) {
        $rental = Rental::findOrFail($id);

        $data = $request->all();
        $fileName = time();
        if ($request->hasFile('pre_rental_image')) {
            $image = $request->file('pre_rental_image');
            $fileName .= '.' . $image->getClientOriginalExtension();
            $image->move(public_path(Rental::IMAGE_UPLOAD_PATH), $fileName);
        }
        $rental->update([
            ...$data,
            'pre_rental_image' => $fileName,
        ]);

        return redirect()->back();
    }


    public function storeRental(Request $request) {
        $data = $request->all();
        $fileName = time();
        if ($request->hasFile('driver_license')) {
            $image = $request->file('driver_license');
            $fileName .= '.' . $image->getClientOriginalExtension();
            $image->move(public_path(Rental::IMAGE_UPLOAD_PATH), $fileName);
        }
        Rental::create([
            ...$data,
            'driver_license' => $fileName,
            'user_id' => Auth::user()->id,
            'status' => 'Unpaid'
        ]);

        // dd($data);
        return redirect(route('home'));
    }
}
