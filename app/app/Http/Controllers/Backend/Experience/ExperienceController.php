<?php

namespace App\Http\Controllers\Backend\Experience;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experience = Experience::get();
        return view('resume.Backend.experience.datatables');
    }

    public function data()
    {
        $experience = Experience::select(['id', 'header', 'head', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($experience)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.experience.created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'head' => 'required',
            'contents' => 'required',
        ]);
        $experience = new Experience();
        $experience->header = $request->input('header');
        $experience->head = $request->input('head');
        $experience->contents = $request->input('contents');
        $experience->save();
        return redirect()->route('datatables.experience');
    }
    //update
    public function edit($id)
    {
        $experience = Experience::find($id);
        return view('resume.Backend.experience.updated', compact('experience'));
    }
    public function update(Request $request, $id)
    {
        $experience = Experience::find($id);

        if ($experience) {
            $data =  $request->validate([
                'header' => 'required',
                'head' => 'required',
                'contents' => 'required',
            ]);
            $experience->update([
                'header' => $data['header'],
                'head' => $data['head'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.experience');
        } else {
            return back();
        }
    }

    //destroy
    public function delete($id)
    {
        $experience = Experience::findOrFail($id);
        if ($experience) {
            $experience->delete();

            return redirect()->route('datatables.experience', compact('experience'));
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}
