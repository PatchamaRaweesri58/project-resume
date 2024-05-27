@extends('layouts.backend.admin.master')

@section('style')
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <title>Data Table</title>
{{-- 
    <!--นำเข้าไฟล์  Css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />

    <!--นำเข้าไฟล์  Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>

    <!--นำเข้าไฟล์  plug-in DataTable -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> --}}

    {{-- <นำเข้า bootstap> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script> --}}

@endsection

@section('content')
    <div class="container">
   
        @php
            function encryptFrontEnd($type, $name)
            {
                if ($type == 'model') {
                    if ($name == 'Experience') {
                        return 'bbbb';
                    } elseif ($name == 'Education') {
                        return 'aaaa';
                    }
                } elseif ($type == 'route') {
                    if ($name == 'education') {
                        return 'xxxx';
                    } elseif ($name == 'experience') {
                        return 'yyyy';
                    }
                }
                return null;
            }
        @endphp
        <form action="{{ route('datatables.experience.update', ['id' => $experience->id]) }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="model" value="{{ encryptFrontEnd('model', 'Experience') }}">
            <input type="hidden" name="return" value="{{ encryptFrontEnd('route', 'experience') }}">
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" value="{{ $experience->header }}"
                    placeholder="ส่วนของ header" hidden>
            </div>

            <div class="form-group">
                <label for="head">ประสบการณ์การทำงาน ปี พ.ศ.</label>
                <input type="text" class="form-control" name="head" id="head" value="{{ $experience->head }}"
                    placeholder="ส่วนของ header">
            </div>

            <div class="form-group">
                <label for="contents">รายละเอียดการทำงาน</label>
                <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents">{{ $experience->contents }}</textarea>
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('editor1');
    </script>
@endsection
