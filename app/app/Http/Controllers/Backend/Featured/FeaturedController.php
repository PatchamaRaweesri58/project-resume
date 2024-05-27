<?php

namespace App\Http\Controllers\Backend\Featured;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Featured;
use Yajra\DataTables\Facades\DataTables;

class FeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured = Featured::get();
        return view('resume.Backend.featured.datatables');
    }

    public function data()
    {
        $featured = Featured::select(['id', 'header', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($featured)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.featured.created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'contents' => 'required',
        ]);
        $featured = new Featured();
        $featured->header = $request->input('header');
        $featured->contents = $request->input('contents');
        $featured->save();
        return redirect()->route('datatables.featured');
    }
    //update
    public function edit($id)
    {
        $featured = Featured::find($id);
        return view('resume.Backend.featured.updated', compact('featured'));
    }
    public function update(Request $request, $id)
    {
        $featured = Featured::find($id);

        if ($featured) {
            $data =  $request->validate([
                'header' => 'required',
                'contents' => 'required',
            ]);
            $featured->update([
                'header' => $data['header'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.featured');
        } else {
            return back();
        }
    }

    //destroy
    public function delete($id)
    {
        $featured = Featured::find($id);
        if ($featured) {
            $featured->delete();

            return response()->json(['message'=>'Sucsess'],200);
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}
