@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar">
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
            </nav>

            <!-- Main content area -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <h1 class="mt-4">Table Profile</h1>
                <button class="btn btn-primary" onclick="window.location.href='/add'">+ Create</button>
             
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
                "pageLength": 10, // Initial page length
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


