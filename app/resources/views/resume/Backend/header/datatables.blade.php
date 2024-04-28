<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link href='https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic' rel='stylesheet' type='text/css'> --}}

    <link rel="stylesheet" href="//cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
</head>

<body>

    <div style="display: flex; align-items: center;">
        <h1 style="margin-right: auto;">Table Profile</h1>
        {{-- <button class="btn btn-success" onclick="window.location.href='/bn-profile/add'">+create</button> --}}
        <button class="btn btn-success" onclick="window.location.href='/add'">+create</button>
    </div>
    <table id="myTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Header</th>
                <th>Head</th>
                <th>Contents</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody id="">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td> </td>
                <td></td>
                <td></td>

            </tr>
        </tbody>
    </table>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#myTable').DataTable({
                "processing": true,
                "serverSide": true,

                "pageLength": 10, // Initial page length
                "ajax": "{{ route('api.datatables.experience') }}",
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "header"
                    },
                    {
                        "data":"head"
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
                            return '<button class="btn btn-danger" onclick="deleteProfile(' + row
                                .id + ')">Delete</button>';
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
                    url: '/delete/' + id,
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

</body>

</html>
