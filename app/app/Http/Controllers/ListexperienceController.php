<?php

namespace App\Http\Controllers;

use App\Models\Listexperience;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListexperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listexperience = Listexperience::get();
        return view('resume.Backend.experience.st_datatable');
    }

    public function data()
    {
        $listexperience = Listexperience::select(['id', 'header','head', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($listexperience)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.experience.st_created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'contents' => 'required',
        ]);
        $experience = new Listexperience();
        $experience->header = $request->input('header');
        $experience->contents = $request->input('contents');
        $experience->save();
        return redirect()->route('datatables.listexperience');
    }
    //update
    public function edit($id)
    {
        $listexperience = Listexperience::find($id);
        return view('resume.Backend.experience.st_updated', compact('listexperience'));
    }
    public function update(Request $request, $id)
    {
        $listexperience = Listexperience::find($id);

        if ($listexperience) {
            $data =  $request->validate([
                'header' => 'required',
                'contents' => 'required',
            ]);
            $listexperience->update([
                'header' => $data['header'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.listexperience');
        } else {
            return back();
        }
    }

    //destroy
    public function delete($id)
    {
        $listexperience = Listexperience::findOrFail($id);

        $listexperience->delete();

        return response()->json(['message' => 'Delete successflly']);
    }
}
