@extends('layouts.backend.admin.master')

@section('style')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Data Table</title>
 <!-- DataTables CSS -->
 <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

 <!-- jQuery -->
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

 <!-- DataTables JS -->
 <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

 <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
 <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
@endsection

@section('content')
   
            <!-- Sidebar -->


            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Table Skills</h1>
                <button class="btn btn-primary float-right" onclick="window.location.href='/datatables/skills/create'">+ Create</button>
            <div class="table">
                <table id="myTable" class="table" style="width:100%">
                    <!-- Table content goes here -->
                </table>
            </div>
            </main>
   
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 10, // Initial page length
                "ajax": "{{ route('api.datatables.skills') }}",
                "columns": [{
                        "data": "id",
                        "title": "ID"
                    },
                    {
                        "data": "header",
                        "title": "หัวข้อหลัก"
                    },
                    {
                        "data": "contents",
                        "title": "เนื้อหา",
                        "render": function(data, type, row) {
                            // ตรวจสอบว่าเนื้อหามีความยาวมากกว่า 20 ตัวอักษรหรือไม่
                            if (data.length > 20) {
                                // ถ้ามีให้แสดงเนื้อหาเฉพาะ 20 ตัวอักษรแรก
                                var shortContent = data.substring(0, 20) + '...';
                                // ใส่ Tooltip ที่มีเนื้อหาทั้งหมด
                                return '<span data-bs-toggle="tooltip" data-placement="top" title="' +
                                    data + '">' + shortContent + '</span>';
                            } else {
                                // ถ้าไม่ให้แสดงเนื้อหาทั้งหมดโดยไม่ใช้ Tooltip
                                return data;
                            }
                        }
                    },
                    {
                        "data": "created_at",
                        "title": "วันที่สร้าง",
                        "render": function(data, type, row) {
                            var date = new Date(data);
                            return date
                                .toLocaleDateString(); // ให้แสดงวันที่ในรูปแบบ "วัน เดือน ปี"
                        }
                    },
                    {
                        "data": "updated_at",
                        "title": "อัปเดตล่าสุด",
                        "render": function(data, type, row) {
                            var updatedAt = new Date(data);
                            var now = new Date();
                            var diffMs = now -
                            updatedAt; // คำนวณหาความแตกต่างของเวลาในรูปแบบมิลลิวินาที
                            var diffMins = Math.round(diffMs / 60000); // แปลงมิลลิวินาทีเป็นนาที

                            if (diffMins < 60) { // ถ้าเวลาผ่านมาน้อยกว่าหนึ่งชั่วโมง
                                return diffMins + " นาทีที่แล้ว"; // แสดงผลลัพธ์เป็นนาทีที่ผ่านมา
                            } else if (diffMins <
                                1440) { // ถ้าเวลาผ่านมาน้อยกว่าหนึ่งวัน (1440 นาที)
                                var diffHours = Math.floor(diffMins /
                                60); // หาจำนวนชั่วโมงที่ผ่านมา
                                var remainingMins = diffMins % 60; // หาจำนวนนาทีที่เหลือ
                                return diffHours + " ชั่วโมง " + remainingMins +
                                " นาทีที่แล้ว"; // แสดงผลลัพธ์เป็นชั่วโมงและนาทีที่ผ่านมา
                            } else {
                                var diffDays = Math.floor(diffMins / 1440); // หาจำนวนวันที่ผ่านมา
                                var remainingHours = Math.floor((diffMins % 1440) /
                                60); // หาจำนวนชั่วโมงที่เหลือหลังจากหารวันลงตัว
                                var remainingMins = (diffMins % 1440) %
                                60; // หาจำนวนนาทีที่เหลือหลังจากหารวันลงตัวและหารชั่วโมงลงตัว
                                return diffDays + " วัน " + remainingHours + " ชั่วโมง " +
                                    remainingMins +
                                    " นาทีที่แล้ว"; // แสดงผลลัพธ์เป็นวัน ชั่วโมง และนาทีที่ผ่านมา
                            }
                        }
                    },
                    {
                        "data": null,
                        "title": "แก้ไข",
                        "render": function(data, type, row) {
                            return '<button class="btn btn-warning" onclick="editProfile(' + row
                                .id + ')">แก้ไข</button>';
                        }
                    },
                    {
                        "data": null,
                        "title": "ลบ",
                        "render": function(data, type, row) {
                            return '<form id="deleteForm_' + row.id +
                                '" action="{{ url('/delete/skills/') }}/' + row.id +
                                '" method="post">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button type="button" onclick="confirmDelete(' + row.id +
                                ')" class="btn btn-danger">Delete</button>' +
                                '</form>';
                        }
                    }
                ],

            });
        });

        function editProfile(id) {
            // เปลี่ยนเส้นทาง URL ไปยังหน้าแก้ไขโปรไฟล์โดยใช้ ID
            window.location.href = '/datatables/skills/edit/' + id;

        }

        // function deleteProfile(id) {
        //     if (confirm('Are you sure you want to delete this profile?')) {
        //         $.ajax({
        //             url: '/delete/skills/' + id,
        //             type: 'DELETE',
        //             data: {
        //                 "_token": "{{ csrf_token() }}"
        //             },
        //             success: function(response) {
        //                 alert(response.message);
        //                 location.reload(); // รีโหลดหน้าหลังจากลบข้อมูล
        //             },
        //             error: function(xhr, status, error) {
        //                 alert('An error occurred while deleting the profile.');
        //                 console.error(xhr.responseText);
        //             }
        //         });
        //     }
        // }
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                // ส่งคำร้องขอลบไปยังเซิร์ฟเวอร์
                fetch('{{ url('/delete/skills/') }}/' + id, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => {
                        // หลังจากลบข้อมูลสำเร็จ รีโหลดหน้า
                        window.location.reload();
                    })
                    .catch(error => console.error('Error deleting item:', error));
            } else {
                // ใส่ alert หรือการปรับปรุง UI อื่นๆ เมื่อผู้ใช้ยกเลิกการลบ
                alert('Delete canceled!');
            }
        }
    </script>
@endsection
