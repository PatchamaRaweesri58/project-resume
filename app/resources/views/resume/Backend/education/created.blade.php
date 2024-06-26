@extends('layouts.backend.admin.master')
@section('style')
<!-- Bootstrap CSS -->
<meta name="csrf-token" content="{{ csrf_token() }}">


<!-- DataTables CSS -->
{{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> --}}
{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
@endsection
@section('content')
    <div class="container-fluid">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    
        
        <form action="{{ route('datatables.education.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" placeholder="ส่วนของ header"
                    value="education" hidden>
            </div>

            <div class="form-group">
                <label for="head">จบการศึกษาปี พ.ศ.</label>
                <input type="text" class="form-control" name="head" id="head" >
            </div>
            <div class="form-group">
                <label for="editor1">+เพิ่มเนื้อหา</label>
             
                <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents"></textarea>
            </div>
            <div class="form-group submit-btn-container">
                <button type="submit" class="btn btn-success float-right">เพิ่มข้อมูล</button>
            </div>
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

        function loadSelectedForm(selectElement) {
            var selectedOption = selectElement.value;

            // ถ้ามีตัวเลือกที่ถูกเลือก
            if (selectedOption) {
                window.location.href = selectedOption; // เปลี่ยนไปยัง URL ที่เลือก
            }
        }
    </script>
@endsection
