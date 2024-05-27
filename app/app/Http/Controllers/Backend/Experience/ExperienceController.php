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

    public function encryptFrontEnd($type, $name)
    {
        if ($type == "model") {
            if ($name == "Education") {
                return "aaaa";
            } elseif ($name == "Experience") {
                return "bbbb";
            }
        } elseif ($type == "route") {
            if ($name == "Education") {
                return "xxxx";
            } elseif ($name == "Experience") {
                return "yyyy";
            }
        }
    }
    public function decryptFrontEnd($type, $name)
    {
        if ($type == "model") {
            if ($name == "aaaa") {
                return "experience";
            } elseif ($name == "bbbb") {
                return Experience::class;
            }
        } elseif ($type == "route") {
            if ($name == "xxxx") {
                return "education";
            } elseif ($name == "yyyy") {
                return "experience";
            }
        }
        return null; // เพิ่มการคืนค่า null เพื่อหลีกเลี่ยงข้อผิดพลาดที่ไม่คาดคิด
    }

    // public function update(Request $request, $id)
    // {
    //     $data =  $request->validate([

    //         'head' => 'required',
    //         'contents' => 'required', 
    //         'model' => 'required', 
    //         'return' => 'required'
    //     ]);

    //     $modelClass = $this->decryptFrontEnd('model', $data['model']);

    //     if (!$modelClass) {
    //         return back()->withErrors(['model' => 'โมเดลไม่ถูกต้อง']);
    //     }

    //     $experience = $modelClass::find($id);

    //     if ($experience) {
    //         $experience->update([
    //             'header' => $data['header'],
    //             'head' => $data['head'],
    //             'contents' => $data['contents']
    //         ]);
    //         return redirect()->route('datatables.' . $this->decryptFrontEnd('route', $data['return']));
    //     } else {
    //         return back()->withErrors(['id' => 'ไม่พบข้อมูล']);
    //     }
    // }

    //Update
    public function update(Request $request, $id)
    {
        $experience = Experience::find($id);
        $data = $request->validate([
            'head' => 'required',
            'contents' => 'required'
        ]);
        if ($experience) {
            $experience->update([
                'head' => $data['head'],
                'contents' => $data['contents']
            ]);
            return redirect()->route('datatables.experience');
        } else {
            return back()->withErrors(['message' => 'Error Not can Update data']);
        }
    }


    //destroy
    public function delete($id)
    {
        $experience = Experience::findOrFail($id);
        if ($experience) {

            $experience->delete();

            return response()->json(['message' => 'Sucsess'], 200);
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }
    }
}
