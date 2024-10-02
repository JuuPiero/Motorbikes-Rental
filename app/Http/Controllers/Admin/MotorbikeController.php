<?php

namespace App\Http\Controllers\Admin;

use App\Extensions\Motorbike\MotorbikeStatus;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Motorbike;
use Illuminate\Http\Request;

class MotorbikeController extends Controller {
    public function index() {
        $motorbikes = Motorbike::orderByDesc('updated_at')
        ->paginate(10);
        return view('admin.motorbikes.index')->with([
            'motorbikes' => $motorbikes
        ]);
    }


    public function create() {
        // $categories = Category::where('parent_id', 0)->get();
        $bikeStatus = MotorbikeStatus::getStatus();
        return view('admin.motorbikes.create')->with([
            'bikeStatus' => $bikeStatus
        ]);
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'license_plate' => 'required|unique:motorbikes',
        ]);
        $data = $request->all();
        $motorbike = Motorbike::create($data);
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $index => $image) {
                $fileName = $motorbike->id . '_' . $index . '_' . time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path(Motorbike::IMAGE_UPLOAD_PATH), $fileName);
                Image::create([
                    'motorbike_id' => $motorbike->id,
                    'name' => $fileName
                ]);
            }
        }
        return redirect()->back()->with('message', 'tạo thành công');
    }



    public function edit($id) {
        // $product = $this->productRepository->find($id);
        $motorbike = Motorbike::findOrFail($id);
        return view('admin.motorbikes.edit')->with([
            // 'product' => $product,
            'motorbike' => $motorbike
        ]);
    }

    public function update($id, Request $request) {
        $motorbike = Motorbike::findOrFail($id);

        $data = $request->all();

        if($request->hasFile('images')) {
            foreach ($motorbike->images as $image) {
                $filePath = public_path(Motorbike::IMAGE_UPLOAD_PATH . '/' . $image->name);
                if (file_exists($filePath)) unlink($filePath);
                Image::destroy($image->id);
            }

            $images = $request->file('images');
            foreach ($images as $index => $image) {
                $fileName = $motorbike->id . '_' . $index . '_' . time() . '.' .  $image->getClientOriginalExtension();
                $image->move(public_path(Motorbike::IMAGE_UPLOAD_PATH), $fileName);
                Image::create([
                    'motorbike_id' => $motorbike->id,
                    'name' => $fileName
                ]);
            }
        }
        $motorbike->update($data);
        // $this->productRepository->update($id, $request);
        return redirect()->route('admin.motorbike')->with([
            'message' => 'cập nhật thành công'
        ]);
    }

    public function delete($id) {
        try {
            // Xóa tất cả hình ảnh liên kết với các sản phẩm 
            $images = Image::where('motorbike_id', $id)->get();
            foreach ($images as $image) {
                $filePath = public_path(Motorbike::IMAGE_UPLOAD_PATH . '/' . $image->name);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            Motorbike::destroy($id);
            return redirect()->back()->with('message', 'Item deleted successfully');

        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
        // return redirect()->back()->with('message', 'xóa thành công');
    }
}
