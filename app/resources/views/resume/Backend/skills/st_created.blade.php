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
    <form action="{{ route('datatables.skills.list.store') }}" method="POST">
        @csrf
        <label for="listskills">เลือกหัวข้อ</label>
        <select name="header" id="listskills"  onchange="toggleOptions()">
            <option >เลือกหัวข้อ</option>
            <option value="SOFTSKILLS">Soft Skills</option>
            <option value="TECHNICAL SKILLS">Technical Skills</option>
        </select>

        <div id="additionalOptions" style="display: none;">
            <label for="subcategory">Subcategory:</label>
            <select id="subcategory" name="head">
                <option value="Languages">Language</option>
                <option value="Framework/Libraries">Framework</option>
                <option value="Version">Version</option>
            </select>
        </div>
        
        <div class="form-group">
            
            <textarea id="editor1" rows="10" cols="80" name="contents" placeholder="ส่วนของ contents"></textarea>
        </div>
        
        <div class="form-group submit-btn-container">
            <button type="submit" class="btn btn-success float-right">เพิ่มข้อมูล</button>
        </div>
    </form>
@endsection

@section('script')
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        function toggleOptions() {
            var skillsSelect = document.getElementById("listskills");
            var additionalOptions = document.getElementById("additionalOptions");

            // Show subcategory options if "Technical Skills" is selected
            if (skillsSelect.value === "TECHNICAL SKILLS") {
                additionalOptions.style.display = "block";
            } else {
                additionalOptions.style.display = "none";
            }
        }

        // Initialize CKEditor
        CKEDITOR.replace('editor1');
    </script>
@endsection
