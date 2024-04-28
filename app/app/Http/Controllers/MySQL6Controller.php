<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MySQL6Controller extends Controller
{
    public function connect()
    {
        // ดำเนินการเชื่อมต่อกับ MySQL ที่ 6 ด้วยข้อมูลการเชื่อมต่อที่กำหนดใน config/database.php
        try {
            $connection = DB::connection('mysql6')->getPdo();
            return response()->json(['message' => 'Connected successfully to MySQL 6']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Connection failed: ' . $e->getMessage()], 500);
        }
    }
}
