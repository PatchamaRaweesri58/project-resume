@extends('layouts.app')

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
    <!-- Include the CKEditor JavaScript and CSS files -->
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.css">

    {{-- <นำเข้า bootstap> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        <h1>Updated ข้อมูล</h1>
        <form action="{{ route('api.datatables.updateprofile', ['id' => $profiles->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="header">Header</label>
                <input type="text" class="form-control" name="header" id="header" value="{{ $profiles->header }}" placeholder="ส่วนของ header">
            </div>

            <div class="form-group">
                <label for="contents">Contents</label>
                <input type="text" class="form-control" name="contents" id="contents" value="{{ $profiles->contents }}" placeholder="ส่วนของ contents">
                {{-- <textarea class="form-control" name="contents" id="contents" placeholder="ส่วนของ contents">{{ $profiles->contents }}</textarea> --}}
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
{{-- @section('script')
<!-- Initialize CKEditor -->
<script>
    CKEDITOR.replace('contents');
</script>
@endsection --}}