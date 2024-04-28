<?php

namespace App\Http\Controllers;

use App\Models\Listfeatured;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListfeaturedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $listfeatured = Listfeatured::get();
        return view('resume.Backend.featured.st_datatables');
    }

    public function data()
    {
        $listfeatured = Listfeatured::select(['id', 'header','head', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($listfeatured)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.featured.st_created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'head' => 'required',
            'contents' => 'required',
        ]);
        $listfeatured = new Listfeatured();
        $listfeatured->header = $request->input('header');
        $listfeatured->head = $request->input('head');
        $listfeatured->contents = $request->input('contents');
        $listfeatured->save();
        return redirect()->route('datatables.listfeatured');
    }
    //update
    public function edit($id)
    {
        $listfeatured = Listfeatured::find($id);
        return view('resume.Backend.featured.st_updated', compact('listfeatured'));
    }
    
    public function update(Request $request, $id)
    {
        $listfeatured = Listfeatured::find($id);

        if ($listfeatured) {
            $data =  $request->validate([
                'header' => 'required',
                'head' => 'required',
                'contents' => 'required',
            ]);
            $listfeatured->update([
                'header' => $data['header'],
                'head' => $data['head'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.listfeatured');
        } else {
            return back();
        }
    }

    //destroy
    public function destroy($id)
    {
        $listfeatured = Listfeatured::findOrFail($id);

        $listfeatured->delete();

        return response()->json(['message' => 'Delete successflly']);
    }
}
