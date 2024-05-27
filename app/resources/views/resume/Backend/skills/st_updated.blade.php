@extends('layouts.backend.admin.master')
@section('style')
    <!-- Bootstrap CSS -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- DataTables CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
@endsection

@section('content')
    <div class="container">


        <form action="{{ route('datatables.skills.list.update', ['id' => $listskills->id]) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="header">Header</label>
                <input type="text" class="form-control" name="header" id="header" value="{{ $listskills->header }}"
                    placeholder="ส่วนของ header">
            </div>

            <div class="form-group">
                <label for="head">Head</label>
                <input type="text" class="form-control" name="head" id="head" value="{{ $listskills->head }}"
                    placeholder="ส่วนของ head">
            </div>

            <div class="form-group">
                <label for="contents">Contents</label>
                <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents">{{ $listskills->contents }}</textarea>
            </div>

    </div>

    <button type="submit" class="btn btn-success float-right">Submit</button>
    </form>
    </div>
@endsection

@section('script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
