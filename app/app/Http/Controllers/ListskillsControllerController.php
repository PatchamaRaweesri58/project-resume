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

    // public function data()
    // {
    //     $listskills = ListskillsController::select(['id', 'header', 'head', 'contents', 'created_at', 'updated_at']);

    //     return DataTables::of($listskills)->make(true);
    // }

    // public function data(Request $request)
    // {
    //     $columns = ['id', 'header', 'head', 'contents', 'created_at', 'updated_at'];

    //     $query = ListskillsController::query();

    //     if ($request->input('search.value')) {
    //         $search = $request->input('search.value');
    //         $query->where(function($q) use ($search) {
    //             $q->where('header', 'like', "%{$search}%")
    //               ->orWhere('head', 'like', "%{$search}%")
    //               ->orWhere('contents', 'like', "%{$search}%");
    //         });
    //     }

    //     return DataTables::of($query)
    //         ->addColumn('action', function($row){
    //             // คุณสามารถเพิ่มปุ่มหรือการกระทำอื่นๆที่นี่ได้
    //             return '<button class="btn btn-primary">Action</button>';
    //         })
    //         ->rawColumns(['action'])
    //         ->make(true);
    // }

    public function data(Request $request)
    {
        $columns = ['id', 'header', 'head', 'contents', 'created_at', 'updated_at'];

        $query = ListskillsController::query();

        if ($request->input('search.value')) {
            $search = $request->input('search.value');
            $query->where(function($q) use ($search) {
                $q->where('header', 'like', "%{$search}%")
                  ->orWhere('head', 'like', "%{$search}%")
                  ->orWhere('contents', 'like', "%{$search}%");
            });
        }

        return DataTables::of($query)
            ->addColumn('action', function($row){
                $editUrl = route('datatables.skills.list.edit', $row->id);
                $deleteUrl = route('datatables.skills.list.destroy', $row->id);
                $csrfToken = csrf_token();

                return '
                <a href="' . htmlspecialchars($editUrl) . '" class="btn btn-primary">แก้ไข</a>
                <form action="' . htmlspecialchars($deleteUrl) . '" method="POST" style="display:inline-block;">
                    ' . method_field('DELETE') . '
                    ' . csrf_field() . '
                    <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this Content?\');">ลบ</button>
                </form>
            ';
            })
            ->rawColumns(['action'])
            ->make(true);
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
    // public function edit($id)
    // {
    //     $listskills = ListskillsController::find($id);
    //     return view('resume.Backend.skills.st_updated', compact('listskills'));
    // }
    // public function update(Request $request, $id)
    // {
    //     $listskills = ListskillsController::find($id);

    //     if ($listskills) {
    //         $data =  $request->validate([
    //             'header' => 'required',
    //             'head' => 'required',
    //             'contents' => 'required',
    //         ]);
    //         $listskills->update([
    //             'header' => $data['header'],
    //             'head' => $data['head'],
    //             'contents' => $data['contents']
    //         ]);
    //         return redirect()->route('datatables.listskills');
    //     } else {
    //         return back()->withErrors(['error' => 'ไม่พบข้อมูลโปรไฟล์']);
    //     }
    // }

    // //destroy
    // public function destroy($id)
    // {
    //     $listskills = ListskillsController::findOrFail($id);

    //     $listskills->delete();

    //     return response()->json(['message' => 'Delete successflly']);
    // }


    public function edit($id)
    {
        $listskills = ListskillsController::find($id);
        return view('resume.Backend.skills.st_updated', compact('listskills'));
    }

//     public function update(Request $request, $id)
//     {
//         $listskills = ListskillsController::find($id);
//         $listskills->update($request->all());
//         return redirect()->route('datatables.listskillsController');
//     }

//     public function destroy($id)
// {
//     $listskills = ListskillsController::find($id);

//     if (!$listskills) {
//         return redirect()->route('datatables.listskillsController')->with('error', 'List-Skill not found');
//     }

//     $listskills->delete();
//     return redirect()->route('datatables.listskillsController')->with('success', 'List-Skill deleted successfully');
// }


public function update(Request $request, $id)
{
    // dd($id);
    $listskills = ListskillsController::find($id);

    if ($listskills) {
        $data =  $request->validate([
            'header' => 'required',
            'contents' => 'required',
        ]);
        $listskills->update([
            'header' => $data['header'],
            'contents' => $data['contents']
        ]);
        return redirect()->route('datatables.listskillsController');
    } else {
        return back();
    }
}

//destroy
public function delete($id)
{

    $listskills = ListskillsController::findOrFail($id);
    if ( $listskills) {
        $listskills->delete();

        return response()->json(['message'=>'Success delete data'],203);
    } else {
        return response()->json(['message' => 'Profile not found'], 404);
    }
}
    }

