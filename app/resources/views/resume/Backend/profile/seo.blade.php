@extends('layouts.backend.admin.master')

@section('style')
    <!-- เพิ่ม style ที่ต้องการในส่วนนี้ -->
    <link href="custom-style.css" rel="stylesheet" />

    <!--นำเข้าไฟล์  Css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />

    <!--นำเข้าไฟล์  Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!--นำเข้าไฟล์  plug-in DataTable -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    {{-- <นำเข้า bootstap> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
@endsection

@section('content')
    <!-- เพิ่มเนื้อหาหน้าเว็บไซต์ที่ต้องการในส่วนนี้ -->
    <div class="container">
        <div class="row">
            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Table St_Profile</h1>
                <button class="btn btn-primary" onclick="window.location.href='/datatables/stprofile/created'">+
                    Create</button>
                <table id="myTable" class="table mt-4" style="width:100%">
<thead>
    <tr>
        <th>ID</th>
    </tr>
</thead>
                    <!-- Table content goes here -->
                </table>
            </main>
        </div>
    </div>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {

            $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,
                "paging": true, // เปิดใช้งาน pagination
                "ajax": "{{ route('api.datatables.data') }}",
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
                        "title": "เนื้อหา"
                    },
                    {
                        "data": "created_at",
                        "title": "วันที่สร้าง"
                    },
                    {
                        "data": "updated_at",
                        "title": "อัปเดตล่าสุด"
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
                            return '<form action="{{ url('/delete/profile/') }}/' + row.id +
                                '" method="post">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button type="submit" class="btn btn-danger">Delete</button>' +
                                '</form>';
                        }
                    }
                ],
                "lengthMenu": [10, 25, 50, 100], // Customize the length menu options
                "pageLength": 3, // Initial page length
                "pagingType": "simple_numbers", // Display simple pagination control with page numbers
                "language": {
                    "paginate": {
                        "previous": "Previous",
                        "next": "Next"
                    }
                }
            });
        });

        function editProfile(id) {
            window.location.href = "/updated/" + id;
        }

        function deleteProfile(id) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            if (confirm('Are you sure you want to delete this ?')) {
                $.ajax({
                    url: '{{ route('profile.delete', ['id' => ':id']) }}'.replace(':id', id),
                    type: 'DELETE',
                    data: {
                        "_token": csrfToken
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // รีโหลดหน้าหลังจากลบข้อมูล
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while deleting .');
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>
@endsection
