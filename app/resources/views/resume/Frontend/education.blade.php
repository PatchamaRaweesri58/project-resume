<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>education</title>
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
                    <li><a class="no_border purple" href="{{ route('education') }}">Education</a></li>
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
            <div class="block">
                <h1>Education</h1>
                @for ($i = 0; $i < count($edu); $i++)
                    <blockquote class="profile_quote">

                        <p>{!! $edu[$i]->head !!}</p>
                        <p>{!! $edu[$i]->contents !!}</p>

                        <span class="entypo-quote"></span>
                    </blockquote>
                    
                @endfor
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

        </div>
        <div class="clear"></div>
        <!-- FOOTER -->
        <div id="footer">
            <p class="footer_name">Patchama Raweesri CV 2023</p>
        </div>
    </div>

</body>

</html>
