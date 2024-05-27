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
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    {{-- <นำเข้า bootstap> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script> --}}


@endsection

@section('content')
    <div class="container">


        <form action="{{route('datatables.experience.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" placeholder="ส่วนของ header" value="experience" hidden>
            </div>

            <div class="form-group">
                <label for="head">ประสบการณ์การทำงาน ปี พ.ศ.</label>
                <input type="text" class="form-control" name="head" id="head" placeholder="ส่วนของ head">
            </div>

            <div class="form-group">
                <label for="contents">รายละเอียดการทำงาน</label>
                <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents"></textarea>
            </div>

            <button type="submit" class="btn btn-success float-right">Submit</button>
        </form>
    </div>
@endsection
@section('script')
    <!-- jQuery -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> --}}
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        // เรียกใช้ CKEditor บน textarea ที่มี id="editor1"
        CKEDITOR.replace('editor1');

        // function loadSelectedForm(selectElement) {
        //     var selectedOption = selectElement.value;

        //     // ถ้ามีตัวเลือกที่ถูกเลือก
        //     if (selectedOption) {
        //         window.location.href = selectedOption; // เปลี่ยนไปยัง URL ที่เลือก
        //     }
        // }
    </script>
@endsection
