@extends('layouts.backend.admin.master')

@section('style')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Data Table</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />


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
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('datatables.listexperience') }}">
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
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('datatables.listfeatured') }}">
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
                <h1 class="mt-4">Table Certificates</h1>
                <button class="btn btn-primary" onclick="window.location.href='/add/image'">+ Create</button>
                <table id="myTable" class="table mt-4" style="width:100%">
                    <!-- Table content goes here -->
                </table>
            </main>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,

                "pageLength": 10, // Initial page length
                "ajax": "{{ route('api.datatables_st.data') }}",
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "header"
                    },
                    {
                        "data": "contents"
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "updated_at"
                    },
                    {
                        "data": null,
                        "render": function(data, type, row) {
                            return '<button class="btn btn-warning" onclick="editProfile(' + row
                                .id + ')">แก้ไข</button>';
                        }
                    },
                    {
                    "data": null,
                    "render": function(data, type, row) {
                        return '<form action="{{ url('/delete/education/') }}/' + row.id +
                            '" method="post">' +
                            '@csrf' +
                            '@method('DELETE')' +
                            '<button type="button" onclick="confirmDelete(' + row.id +
                                ')" class="btn btn-danger">Delete</button>' +
                                '</form>';
                    }
                }
                ],
                "lengthMenu": [10, 25, 50, 100], // Customize the length menu options
                "pageLength": 10, // Initial page length
                "pagingType": "full_numbers" // Display pagination control with page numbers
            });
        });

        function editProfile(id) {
            // เปลี่ยนเส้นทาง URL ไปยังหน้าแก้ไขโปรไฟล์โดยใช้ ID
            window.location.href = '/updated/' + id;

        }

        function deleteProfile(id) {
            if (confirm('Are you sure you want to delete this profile?')) {
                $.ajax({
                    url: '/delete/education/list/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {
                        alert(response.message);
                        location.reload(); // รีโหลดหน้าหลังจากลบข้อมูล
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while deleting the profile.');
                        console.error(xhr.responseText);
                    }
                });
            }
        }
    </script>

@endsection