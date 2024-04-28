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
    {{-- <นำเข้า CKEditor> --}}
    {{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}

    {{-- <นำเข้า bootstap> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <h1>+เพิ่มข้อมูล</h1>

        <form action="{{ route('datatables.created') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="header">Header</label>
                <input type="text" class="form-control" name="header" id="header" placeholder="ส่วนของ header">
            </div>

            <div class="form-group">
                <label for="contents">Contents</label>
                <input type="text" class="form-control" name="contents" id="contents" placeholder="ส่วนของ content">
                {{-- <textarea class="form-control" name="contents" id="contents" placeholder="ส่วนของ contents"></textarea> --}}
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    </div>
@endsection
{{-- @section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#contents'), {
                // กำหนดคอนฟิกให้ CKEditor รองรับแท็ก <p>
                allowedContent: false
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
