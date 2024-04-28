@extends('layouts.backend.admin.master')

@section('style')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Data Table</title>

    <!--นำเข้าไฟล์  Css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />

    <!--นำเข้าไฟล์  Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!--นำเข้าไฟล์  plug-in DataTable -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    {{-- <นำเข้า bootstap> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

    {{-- <style>
        /* Media Queries เพื่อทำให้เว็บ Responsive */

        /* เมื่อหน้าจอมีขนาดเล็กกว่าหรือเท่ากับ 768px */
        @media screen and (max-width: 768px) {
            #sidebar {
                display: none;
                /* ซ่อน Sidebar เมื่อเข้า Media Queries */
            }

            .col-md-9 {
                width: 100%;
                /* ตั้งค่าความกว้างของเนื้อหาเป็น 100% เมื่อเข้า Media Queries */
            }

            .btn-primary {
                display: block;
                margin: auto;
                /* จัด Button กลางของหน้าจอเมื่อเข้า Media Queries */
            }

            .navbar-nav {
                flex-direction: column;
                /* เรียงเมนูแนวตั้ง */
            }

            /* ปรับระยะห่างของเมนูซ้ายและขวาให้มีระยะห่างจากกัน */
            .navbar-nav>li {
                margin-bottom: 10px;
            }

            /* ปรับขนาดของ Logo เมื่อเข้า Media Queries */
            .navbar-brand img {
                width: 100px;
                /* ขนาดของโลโก้ */
                height: auto;
            }
        }
    </style> --}}
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            {{-- <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('datatables') }}">
                                Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('datatables.st') }}">
                                List:Profile
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('datatables.education') }}">
                                Education
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('datatables.skills') }}">
                                Skills
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('datatables.listskillsController') }}">
                                List:Skills
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('datatables.experience') }}">
                                Work Experience
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('datatables.listexperience') }}">
                                List:Experience
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('datatables.featured') }}">
                                Featured Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('datatables.listfeatured') }}">
                                List:Featured
                            </a>
                        </li>
                        <hr>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('datatables.certificate') }}">
                                Certificates
                            </a>
                        </li>
                        <hr>
                    </ul>
                </div>
            </nav> --}}

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Table Skills</h1>
                <button class="btn btn-primary" onclick="window.location.href='/datatables/skills/create'">+ Create</button>
                <table id="myTable" class="display" style="width:100%">
                    <!-- Table content goes here -->
                </table>
            </main>
        </div>
    </div>
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
                        "title":"ID"
                    },
                    {
                        "data": "header",
                        "title":"หัวข้อหลัก"
                    },
                    {
                        "data": "contents",
                        "title":"เนื้อหา"
                    },
                    {
                        "data": "created_at",
                        "title":"วันที่สร้าง"
                    },
                    {
                        "data": "updated_at",
                        "title":"อัปเดตล่าสุด"
                    },
                    {
                        "data": null,
                        "title":"แก้ไข",
                        "render": function(data, type, row) {
                            return '<button class="btn btn-warning" onclick="editProfile(' + row
                                .id + ')">แก้ไข</button>';
                        }
                    },
                    {
                        "data": null,
                        "title":"ลบ",
                        "render": function(data, type, row) {
                            return '<form action="{{ url('/delete/skills/') }}/' + row.id +
                                '" method="post">' +
                                '@csrf' +
                                '@method('DELETE')' +
                                '<button type="submit" class="btn btn-danger">Delete</button>' +
                                '</form>';
                        }
                    }
                ],
                // "lengthMenu": [10, 25, 50, 100], // Customize the length menu options
                // "pageLength": 10, // Initial page length
                // "pagingType": "full_numbers" // Display pagination control with page numbers
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
    </script>
@endsection
