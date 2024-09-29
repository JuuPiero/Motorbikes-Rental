<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.motorbikes.create');
    }

    public function store(Request $request) {
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
     
        // $this->productRepository->update($id, $request);
        // return redirect()->back()->with('message', 'tạo thành công');
        return redirect()->route('admin.product')->with([
            'message' => 'cập nhật thành công'
        ]);
    }

    public function delete($id) {
        try {
            // Xóa tất cả hình ảnh liên kết với các sản phẩm 
            $images = Image::where('motorbike)id', $id)->get();
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
