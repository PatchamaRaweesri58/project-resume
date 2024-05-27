<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>certificate</title>
    <link href={{ asset('https://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic') }} rel='stylesheet'
        type='text/css'>
    <link rel="stylesheet" href={{ asset('css/resume1.css') }} />
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
                    <li><a href="{{ route('profile') }}">Profile</a></li>
                    <li><a href="{{ route('education') }}">Education</a></li>
                    <li><a href="{{ route('skills') }}">Skills</a></li>
                    <li><a href="{{ route('experience') }}">Work Experience</a></li>
                    <li><a href="{{ route('featured') }}">Featured Projects</a></li>
                    <li><a class="no_border purple" href="{{ route('certificate') }}">Certificates</a></li>
                </ul>
            </div>
        </div>

        <!-- LEFT COL -->
        @include('layouts.frontend.layout')
        <!-- PROFILE CONTENT -->
        <div id="content_container">
            <div class="block">
                <h1>certificates</h1>
                <blockquote class="profile_quote">
                    <span class="">
                        @foreach ($images as $image)
                        <img src="{{ asset('images/' . $image->image) }}" width="200px" height="180px">
                        @endforeach
                    </span>
                    <span class="entypo-quote"></span>
                </blockquote>

            </div>
            <div class="block">
                <p>Patchama Raweesri.</p>
            </div>
            <!-- FOOTER -->
            <div id="footer">
                <p class="footer_name"></p>
            </div>
        </div>
        <!-- เพิ่มปุ่มเพิ่ม -->
      
</body>

</html>
