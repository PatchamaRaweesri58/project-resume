<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NumberController extends Controller
{
    public function checkNumberForm()
    {
        return view('check_number_form');
    }

    public function checkNumber(Request $request)
    {
        $number = $request->input('number');

        // ตรวจสอบเงื่อนไขเพื่อแสดงผลลัพธ์
        if ($number % 2 == 0) {
            $result = "เลขคู่";
        } else {
            $result = "เลขคี่";
        }

        return view('check_number_result', ['result' => $result]);
    }
}
