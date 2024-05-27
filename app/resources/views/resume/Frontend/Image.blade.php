<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- <link href='https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic' rel='stylesheet' type='text/css'> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">


</head>

<body>

    <div style="display: flex; align-items: center;">
        <h1 style="margin-right: auto;">Table Profile</h1>
        {{-- <button class="btn btn-success" onclick="window.location.href='/bn-profile/add'">+create</button> --}}
        <button class="btn btn-success" onclick="window.location.href='/add/image'">+create</button>
    </div>
    <table id="imageTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>





    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#imageTable').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 10, // Initial page length
                "ajax": "{{ route('api.images.data') }}",
                "columns": [{
                        "data": "id"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "image",
                        "render": function(data, type, row, meta) {
                            reture
                                '<img src="{{ asset('images/') }}'+'/'+data+'" with="100px" height="auto"/>';

                        }
                    },
                    {
                        "data": "created_at"
                    },
                    {
                        "data": "updated_at"
                    },
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return '<a href="{{ route('images.edit', ':id') }}">Edit</a>'
                                .replace(':id', data);
                        }
                    },
                    {
                        "data": "id",
                        "render": function(data, type, row, meta) {
                            return return '<form action="{{ route('datatables.image.create', ':id') }}" method="POST">@csrf @method('DELETE')<button type="submit" class="btn btn-danger">Delete</button></form>'
                                .replace(':id', data);
                        }
                    }
                ],
                "lengthMenu": [10, 25, 50, 100], // Customize the length menu options
                "pageLength": 10, // Initial page length
                "pagingType": "full_numbers" // Display pagination control with page numbers
            });
        });

        <
        /body>

        <
        /html>
