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
        {{-- <select id="profileSelect" onchange="loadSelectedForm(this)">
            <option value="">หน้า Profile</option>
            <option value="/add">เพิ่มเนื้อหา Profile</option>
            <option value="/datatables/stprofile/created">เพิ่มเนื้อหา List: Profile</option>
        </select> --}}

        <form action="{{ route('datatables.st.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="header"></label>
                <input type="text" class="form-control" name="header" id="header" placeholder="ส่วนของ header"
                    value="profile" hidden>
            </div>

            <div class="form-group">
                <label for="contents">+เพิ่มเนื้อหา</label>
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
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

    <script>
        var scriptTag = document.createElement('script');
        scriptTag.src = 'https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js';
        document.head.appendChild(scriptTag);
        // เรียกใช้ CKEditor บน textarea ที่มี id="editor1"
        scriptTag.onload = function() {
            // เรียกใช้ CKEditor บน textarea ที่มี id="editor1"
            CKEDITOR.replace('editor1');
        };

        function loadSelectedForm(selectElement) {
            var selectedOption = selectElement.value;

            // ถ้ามีตัวเลือกที่ถูกเลือก
            if (selectedOption) {
                window.location.href = selectedOption; // เปลี่ยนไปยัง URL ที่เลือก
            }
        }
    </script>
@endsection
