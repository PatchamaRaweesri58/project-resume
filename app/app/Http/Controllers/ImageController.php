<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Yajra\DataTables\Facades\DataTables;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('resume.Backend.image.datatables');
    }

    public function getData()
    {
        $images = Image::select(['id', 'name', 'image', 'created_at', 'updated_at']); // ดึงข้อมูลรูปภาพจากฐานข้อมูล
        return DataTables::of($images)->toJson();
    }

    public function create()
    {

        return view('resume.Backend.image.create');
    }



    public function update(Request $request, $id)
    {
        $image = Image::find($id);

        if ($image) {
            $data =  $request->validate([
                'name' => 'required',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Check if a new image is uploaded
            if ($request->hasFile('image')) {
                // Handle image upload
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('images'), $imageName);
                $image->image = $imageName;
            }

            $image->name = $data['name'];
            $image->save();

            return redirect()->route('images.index')->with('success', 'Image updated successfully.');
        } else {
            return back()->with('error', 'Image not found.');
        }
    }

    public function edit(Request $request, $id)
    {

        $image = Image::find($id);

        return view('resume.Backend.image.updated', compact('image'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $image = new Image();
        $image->name = $request->name;
        $image->image = $imageName;
        $image->save();

        return redirect()->route('images.index')
            ->with('success', 'Image uploaded successfully');
    }


    public function delete($id)
    {
        $image = Image::findOrFail($id);
        if ($image) {
            $image->delete();

            return redirect()->route('images.index', compact('image'));
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}
