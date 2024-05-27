<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Yajra\DataTables\Facades\DataTables;

class ProfileController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {

        $profiles = Profile::paginate(2);
        return view('resume.Backend.profile.datatables',compact('profiles'));
    }
 
    //Datatables
    public function data(Request $resuest)
    {
        $profiles = Profile::select(['id', 'header', 'contents', 'created_at', 'updated_at']);

        return DataTables::of($profiles)->toJson();
    }

    public function getData(Request $request)
{
    $draw = intval($request->get('draw'));
    $start = intval($request->get('start'));
    $length = intval($request->get('length'));
    $order = $request->get('order');
    $search = $request->get('search')['value'];

    $query = Profile::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('header', 'like', "%{$search}%")
              ->orWhere('contents', 'like', "%{$search}%");
        });
    }

    $recordsTotal = $query->count();

    if ($order) {
        $columnIndex = $order[0]['column'];
        $columnDir = $order[0]['dir'];
        $columns = ['id', 'header', 'contents', 'created_at', 'updated_at'];
        $columnName = $columns[$columnIndex] ?? 'id';
        $query->orderBy($columnName, $columnDir);
    }

    $profiles = $query->offset($start)->limit($length)->get();

    $response = [
        "draw" => $draw,
        "recordsTotal" => $recordsTotal,
        "recordsFiltered" => $recordsTotal,
        "data" => $profiles,
    ];

    return response()->json($response);
}

}
