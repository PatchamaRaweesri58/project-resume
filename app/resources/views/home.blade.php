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

    {{-- <style>
        /* Media Queries เพื่อทำให้เว็บ Responsive */

        /* เมื่อหน้าจอมีขนาดเล็กกว่าหรือเท่ากับ 768px */
        @media screen and (max-width: 768px) {
            #sidebar {
                display: none;
                /* ซ่อน Sidebar เมื่อเข้า Media Queries */
            }

            .col-md-9 {
                width: 100%;
                /* ตั้งค่าความกว้างของเนื้อหาเป็น 100% เมื่อเข้า Media Queries */
            }

            .btn-primary {
                display: block;
                margin: auto;
                /* จัด Button กลางของหน้าจอเมื่อเข้า Media Queries */
            }

            .navbar-nav {
                flex-direction: column;
                /* เรียงเมนูแนวตั้ง */
            }

            /* ปรับระยะห่างของเมนูซ้ายและขวาให้มีระยะห่างจากกัน */
            .navbar-nav>li {
                margin-bottom: 10px;
            }

            /* ปรับขนาดของ Logo เมื่อเข้า Media Queries */
            .navbar-brand img {
                width: 100px;
                /* ขนาดของโลโก้ */
                height: auto;
            }
        }
    </style> --}}
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
