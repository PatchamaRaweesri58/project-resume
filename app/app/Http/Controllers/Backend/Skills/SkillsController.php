<?php

namespace App\Http\Controllers\Backend\Skills;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skills;
use Illuminate\Support\Composer;
use Yajra\DataTables\Facades\DataTables;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('resume.Backend.skills.datatables');
    }
    public function data()
    {

        $skills = Skills::get();

        return DataTables::of($skills)->toJson();
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.skills.created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'contents' => 'required',
        ]);
        $skills = new Skills();
        $skills->header = $request->input('header');
        $skills->contents = $request->input('contents');
        $skills->save();

        return redirect()->route('datatables.skills');
    }
    //update
    public function edit($id)
    {

        $skills = Skills::find($id);
        return view('resume.Backend.skills.updated', compact('skills'));
    }


    public function update(Request $request, $id)
    {
        // dd($id);
        $skills = Skills::find($id);

        if ($skills) {
            $data =  $request->validate([
                'header' => 'required',
                'contents' => 'required',
            ]);
            $skills->update([
                'header' => $data['header'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.skills');
        } else {
            return back();
        }
    }

    //destroy
    public function delete($id)
    {

        $skills = Skills::find($id);
        if ($skills) {
            $skills->delete();

            return response()->json(['message'=>'Sucsess'],200);
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}
