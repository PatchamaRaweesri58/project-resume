@extends('layouts.backend.admin.master')
@section('style')
<!-- Bootstrap CSS -->
<meta name="csrf-token" content="{{ csrf_token() }}">

{{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('content')

    <div class="container">
    

        <form action="{{route('datatables.skills.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" placeholder="ส่วนของ header" value="skills" hidden>
            </div>

            <div class="form-group">
                <label for="contents">Contents</label>
                <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents"></textarea>        
                </div>

            <button type="submit" class="btn btn-success float-right">Submit</button>
        </form>
    </div>
@endsection
@section('script')
    <!-- jQuery -->

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        // เรียกใช้ CKEditor บน textarea ที่มี id="editor1"
        CKEDITOR.replace('editor1');

       
    </script>
@endsection