<?php

namespace App\Http\Controllers\Backend\Certificate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\certificate;
use App\Models\Image;
use Yajra\DataTables\Facades\DataTables;

class CertificateController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $certificate = Image::get();
        return view('resume.Backend.certificate.datatables');
    }

    public function data()
    {
        $Image  = Image::select(['id', 'name', 'image', 'created_at', 'updated_at']);
        return DataTables::of($Image)->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.certificate.created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'contents' => 'required',
        ]);
        $featured = new Image();
        $featured->header = $request->input('header');
        $featured->contents = $request->input('contents');
        $featured->save();
        return redirect()->route('datatables.certificate');
    }
    //update
    public function edit($id)
    {
        $certificate = Image::find($id);
        return view('resume.Backend.certificate.updated', compact('certificate'));
    }
    public function update(Request $request, $id)
    {
        $certificate = Image::find($id);

        if ($certificate) {
            $data =  $request->validate([
                'header' => 'required',
                'contents' => 'required',
            ]);
            $certificate->update([
                'header' => $data['header'],
                'contents' => $data['contents']
            ]);
            // dd($certificate);
            return redirect()->route('datatables.certificate');
        } else {
            return back();
        }
    }

    //destroy
    public function delete($id)
    {
        $certificate = Image::findOrFail($id);
        if ($certificate) {
            $certificate->delete();

            return redirect()->route('images.index', compact('certificate'));
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}
