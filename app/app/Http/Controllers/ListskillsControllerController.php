<?php

namespace App\Http\Controllers;

use App\Models\ListskillsController;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ListskillsControllerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $listskills = ListskillsController::all();
        return view('resume.Backend.skills.st_datatable', compact('listskills'));
    }

    public function data()
    {
        $listskills = ListskillsController::select(['id', 'header', 'head', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($listskills)->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('resume.Backend.skills.st_created');
    }

    public function store(Request $request)
    {
        $request->validate([
            'header' => 'required',
            'head' => 'required',
            'contents' => 'required',
        ]);
        $listskills = new ListskillsController();
        $listskills->header = $request->input('header');
        $listskills->head = $request->input('head');
        $listskills->contents = $request->input('contents');
        $listskills->save();
        return redirect()->route('datatables.listskillsController');
    }
    //update
    public function edit($id)
    {
        $listskills = ListskillsController::find($id);
        return view('resume.Backend.skills.st_updated', compact('listskills'));
    }
    public function update(Request $request, $id)
    {
        $listskills = ListskillsController::find($id);

        if ($listskills) {
            $data =  $request->validate([
                'header' => 'required',
                'head' => 'required',
                'contents' => 'required',
            ]);
            $listskills->update([
                'header' => $data['header'],
                'head' => $data['head'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.listskills');
        } else {
            return back()->withErrors(['error' => 'ไม่พบข้อมูลโปรไฟล์']);
        }
    }

    //destroy
    public function destroy($id)
    {
        $listskills = ListskillsController::findOrFail($id);

        $listskills->delete();

        return response()->json(['message' => 'Delete successflly']);
    }
}
