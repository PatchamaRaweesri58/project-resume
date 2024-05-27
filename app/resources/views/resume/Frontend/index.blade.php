<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <link href='https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href={{ asset('css/resume1.css') }} />

    <style>
        @media screen and (max-width: 768px) {

            /* ตั้งค่าความกว้างสำหรับเมนูหลักเป็น 100% */
            .header_menu_container {
                width: 100%;
            }

            /* ปรับการแสดงของเมนูเป็นแนวตั้ง */
            .header_menu_container ul.header_menu {
                display: block;
            }

            /* ปรับขนาดรูปภาพโปรไฟล์ให้พอดีกับขนาดของหน้าจอ */
            .profile_picture img {
                width: 100%;
                height: auto;
            }
        }
    </style>


</head>

<body>


    <!-- MAIN CONTAINER -->
    <div id="main_container">
        <!-- HEADER -->
        <div id="header">
            <!-- LOGOTYPE/NAME -->
            <div class="header_logotype_container">
                <h1 class="logotype_name">Patchama <span class="purple">Raweesri</span></h1>
                <h2 class="logotype_occupation">Junior Web Developer</h2>
            </div>
            <!-- MAIN MENU -->
            <div class="header_menu_container">
                <ul class="download_print_buttons horizontal_list">

                </ul>
                <div class="clear"></div>
                <ul class="header_menu horizontal_list">
                    <li><a class="no_border purple" href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('education') }}">Education</a></li>
                    <li><a href="{{ route('skills') }}">Skills</a></li>
                    <li><a href="{{ route('experience') }}">Work Experience</a></li>
                    <li><a href="{{ route('featured') }}">Featured Projects</a></li>
                    <li><a href="{{ route('certificate') }}">Certificates</a></li>
                </ul>
            </div>
        </div>
        <!-- LEFT COL -->
        @include('layouts.frontend.layout')

        <!-- PROFILE CONTENT -->
        <div id="content_container">
            <div id="content_container">
                <h1>Profile</h1>
                @foreach ($profiles as $item)
                    <div class="block">
                        <blockquote class="profile_quote">
                            
                            <p>"{!! $item->contents !!}"</p>
                            
                            <span class="entypo-quote"></span>
                        </blockquote>
                    </div> 
                @endforeach
            </div>




            <div class="block">
                <p>Patchama Raweesri.</p>
            </div>
            <div class="horizontal_line">
                <div class="line_left"></div>
                <div class="left_circle"></div>
                <div class="central_circle"></div>
                <div class="right_circle"></div>
                <div class="line_right"></div>
            </div>

            <div class="horizontal_line">
                <div class="line_left"></div>
                <div class="left_circle"></div>
                <div class="central_circle"></div>
                <div class="right_circle"></div>
                <div class="line_right"></div>
            </div>

            <div class="last block">
                <h2>Interests & Hobbies</h2>

              
                    @foreach ($st as $item)
                        <p>{!! $item->contents !!}</p>
                    @endforeach
              

            </div>

        </div>

        <div class="clear"></div>
        <!-- FOOTER -->
        <div id="footer">
            <p class="footer_name">Patchama Raweesri CV 2023</p>
            <!-- เพิ่มปุ่มเพิ่ม -->

        </div>
    </div>
</body>

</html>
