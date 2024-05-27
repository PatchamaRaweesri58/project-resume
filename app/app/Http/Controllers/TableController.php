<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class TableController extends Controller
{
    public function create()
    {
        return view('create-table');
    }

    public function store(Request $request)
    {
        $tableName = $request->input('tableName');
        $columns = $request->input('columns');

        Schema::create($tableName, function (Blueprint $table) use ($columns) {
            $table->increments('id');
            foreach ($columns as $column) {
                $table->string($column);
            }
            $table->timestamps();
        });

        return redirect()->back()->with('success', 'Table created successfully!');
    }
}
