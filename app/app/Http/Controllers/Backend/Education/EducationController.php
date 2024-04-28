<?php

namespace App\Http\Controllers\Backend\Education;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;
use Yajra\DataTables\Facades\DataTables;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = Education::get();
        return view('resume.Backend.education.datatables', compact('education'));
    }

    public function data()
    {
        $education = Education::select(['id', 'header', 'contents', 'head', 'created_at', 'updated_at']);

        return DataTables::of($education)->toJson();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.education.created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'head' => 'required',
            'contents' => 'required',
        ]);
        $education = new Education();
        $education->header = $request->input('header');
        $education->head = $request->input('head');
        $education->contents = $request->input('contents');
        $education->save();
        return redirect()->route('datatables.education');
    }
    //update
    public function edit($id)
    {
        $education = Education::find($id);
        return view('resume.Backend.education.updated', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $education = Education::find($id);

        if ($education) {
            $data =  $request->validate([
                'header' => 'required',
                'head' => 'required',
                'contents' => 'required',
            ]);
            $education->update([
                'header' => $data['header'],
                'head' => $data['head'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.education');
        } else {
            return back();
        }
    }

    //destroy
    public function delete($id)
    {
        $education = Education::findOrFail($id);

        if ($education) {
            $education->delete();

            return redirect()->route('datatables.education', compact('education'));
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}