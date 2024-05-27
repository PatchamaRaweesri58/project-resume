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

    {{-- <นำเข้า bootstap> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>


@endsection

@section('content')

    <div class="container">
        <h1>+เพิ่มข้อมูล</h1>

        <form action="{{route('datatables.featured.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" placeholder="ส่วนของ header" value="featured" hidden>
            </div>

            {{-- <div class="form-group">
                <label for="contents">Contents</label>
                <input type="text" class="form-control" name="contents" id="contents" placeholder="ส่วนของ contents">
            </div> --}}
            <div class="form-group">
                
                 <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents"></textarea>
             </div>

            <button type="submit" class="btn btn-success float-right">Submit</button>
        </form>
    </div>
@endsection

@section('script')
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<script>
    // เรียกใช้ CKEditor บน textarea ที่มี id="editor1"
    CKEDITOR.replace('editor1');
</script>
@endsection