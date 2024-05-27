@extends('layouts.backend.admin.master')

@section('style')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DataTables with Dropdown Select</title>
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
@endsection

@section('content')
    
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Table List:Skills</h1>
                <button class="btn btn-primary float-right" onclick="window.location.href='/datatable/list/skills/create'">+ Create</button>
                <div class="table">
                <table id="example" class="table" style="width:100%">
                        Create</button>

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Header</th>
                            <th>Head</th>
                            <th>Contents</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Header</th>
                            <th>Head</th>
                            <th>Contents</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>แก้ไข</th>
                            <th>ลบ</th>
                        </tr>
                    </tfoot>
                    <tbody></tbody>
                </table>
                </div>
            </main>
  
@endsection


@section('script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '/api/datatables/list/skills/data',
                    type: 'GET'
                },
                columns: [{
                        data: 'id'
                    },
                    {
                        data: 'header'
                    },
                    {
                        data: 'head'
                    },
                    {
                        data: 'contents'
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
                                '" action="{{ url('/datete/list/skills/') }}/' + row.id +
                                '" method="post">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button type="button" onclick="confirmDelete(' + row.id +
                                ')" class="btn btn-danger">Delete</button>' +
                                '</form>';
                        }
                    }
                ],
                initComplete: function() {
                    this.api().columns([1, 2, ]).every(function() {
                        let column = this;
                        let select = $('<select><option value=""></option></select>')
                            .appendTo($(column.footer()).empty())
                            .on('change', function() {
                                let val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search(val ? '^' + val + '$' : '', true, false)
                                    .draw();
                            });

                        // Fetch unique data for the column from server-side or use all data loaded in table
                        $.ajax({
                            url: '/api/datatables/list/skills/data',
                            type: 'GET',
                            success: function(data) {
                                let uniqueData = [];
                                data.data.forEach(function(item) {
                                    if (!uniqueData.includes(item[column
                                            .dataSrc()])) {
                                        uniqueData.push(item[column
                                            .dataSrc()]);
                                        select.append('<option value="' +
                                            item[column.dataSrc()] +
                                            '">' + item[column
                                                .dataSrc()] +
                                            '</option>');
                                    }
                                });
                            }
                        });
                    });
                }
            });
        });

        function editProfile(id) {
            // เปลี่ยนเส้นทาง URL ไปยังหน้าแก้ไขโปรไฟล์โดยใช้ ID
            window.location.href = '/datatable/list/skills/edit/' + id;

        }
        function confirmDelete(id) {
            if (confirm('Are you sure you want to delete this item?')) {
                // ส่งคำร้องขอลบไปยังเซิร์ฟเวอร์
                fetch('{{ url('/datete/list/skills/') }}/' + id, {
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
