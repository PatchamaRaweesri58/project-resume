@extends('layouts.backend.admin.master')

@section('style')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Data Table</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- DataTables CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">
        
        <form action="{{ route('api.datatables.updateprofile', ['id' => $profiles->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" value="{{ $profiles->header }}"  placeholder="ส่วนของ header" hidden>
            </div>

            <div class="form-group">
                <label for="contents">อัปเดตเนื้อหา</label>
                <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents">{{ $profiles->contents }}</textarea>
              
            </div>
           
            <button type="submit" class="btn btn-success float-right">Submit</button>        </form>
    </div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>
       CKEDITOR.replace('editor1');
</script>
@endsection