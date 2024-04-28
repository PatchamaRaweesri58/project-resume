<?php

namespace App\Http\Controllers\Backend\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;

class UpdatedController extends Controller
{
    public function index(Request $request, $id)
    {
        $profiles = Profile::findOrFail($id);

        return view('resume.Backend.profile.updated', compact('profiles'));
    }

    public function show($id)
    {
        // โค้ดสำหรับแสดงข้อมูลที่มี ID เป็น $id
    }

    public function update(Request $request, $id)
    {
        // ค้นหาข้อมูลโปรไฟล์ที่ต้องการอัปเดต
        $profiles = Profile::find($id);

        // ตรวจสอบว่าพบข้อมูลโปรไฟล์หรือไม่
        if ($profiles) {
            // ทำการตรวจสอบและกำหนดค่าข้อมูลที่ต้องการอัปเดต
            $data = $request->validate([
                'header' => 'required',
                'contents' => 'required',
            ]);

            // ทำการอัปเดตข้อมูลโปรไฟล์
            $profiles->update([
                'header' => $data['header'],
                'contents' => $data['contents'],
            ]);

            // ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อมูลโปรไฟล์ที่อัปเดตแล้ว
            return redirect()->route('datatables');
        } else {
            // หากไม่พบข้อมูลโปรไฟล์ที่ต้องการอัปเดต ส่งกลับไปยังหน้าก่อนหน้าพร้อมกับข้อความข้อผิดพลาด
            return back()->withErrors(['error' => 'ไม่พบข้อมูลโปรไฟล์']);
        }
    }
    public function delete($id)
    {
        // ค้นหาโปรไฟล์ตาม ID และลบ
        $profiles = Profile::find($id);
        if($profiles){
            $profiles->delete();

            return redirect()->route('datatables',compact('profiles'));
        } else {
            return response()->json(['message' => 'Profile not found'], 404);
        }

    }
}
