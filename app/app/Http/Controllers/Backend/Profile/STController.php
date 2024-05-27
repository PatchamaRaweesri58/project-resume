<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\St;
use Illuminate\Support\Composer;
use Yajra\DataTables\Facades\DataTables;

class STController extends Controller
{
    //datatables
    public function index()
    {
        $st = St::paginate(2);
        return view('resume.Backend.profile.st_datatable', compact('st'));
    }
    //api
    public function data()
    {
        $st = St::select(['id', 'header', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($st)->toJson();
    }
    //create
    public function create()
    {

        return view('resume.Backend.profile.st_created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'contents' => 'required',
        ]);
        $st = new St();
        $st->header = $request->input('header');
        $st->contents = $request->input('contents');
        $st->save();
        return redirect()->route('datatables.st');
    }
    //update
    public function edit($id)
    {
        $st = St::find($id);
        return view('resume.Backend.profile.st_updated', compact('st'));
    }
    public function update(Request $request, $id)
    {
        $st = St::find($id);

        if ($st) {
            $data =  $request->validate([
                'header' => 'required',
                'contents' => 'required',
            ]);
            $st->update([
                'header' => $data['header'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.st');
        } else {
            return back()->withErrors(['message'=>'error']);
        }
    }

    //destroy
    public function delete($id)
    {
        $st = St::find($id);
        if($st){
            $st->delete();

            return response()->json(['message'=>'Sucsess'],200);
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
}
}
