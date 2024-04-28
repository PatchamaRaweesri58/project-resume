<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>experience</title>
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
                    <li><a class="no_border purple" href="{{ route('experience') }}">Work Experience</a></li>
                    <li><a href="{{ route('featured') }}">Featured Projects</a></li>
                    <li><a href="{{ route('certificate') }}">Certificates</a></li>
                </ul>
            </div>
        </div>
        <!-- LEFT COL -->
        <div id="left_col">
            <div class="profile_frame">
                <div class="profile_picture">
                    <img src="{{ asset('image/1.jpg') }}" alt="profile picture" width="210px" height="240px"
                        margin= "10px">
                </div>
            </div>
            <div class="hello_content">

                <p>Miss Patchama Raweesri is currently 28 years old.<br>
                    Born on September 1, 1994, currently living at house number 105, Village No. 5, Huang Bong
                    Subdistrict, Chaloem Phra Kiat District, Saraburi Province.
                </p>
            </div>
            <div class="contact_details_content">
                <h2>Contact details</h2>
                <p class="purple">Phone:</p>
                <p><a href="tel:0649194507">064-919-4507</a></p>
                <p class="purple">Email:</p>
                <p><a href="mailto:mp58154580164@gmail.com">mp58154580164@gmail.com</a></p>
                <p class="purple">LINE ID:</p>
                <p><a href="https://line.me/ti/p/~mp07.09">mp07.09</a></p>
                <p class="purple">Adress:</p>
                <p>Village No. 5, Huang Bong Subdistrict</p>
                <p> Chaloem Phra Kiat District </p>
                <p>Saraburi Province.</p>
                <p>18000</p>
            </div>

        </div>
        <!-- PROFILE CONTENT -->
        <div id="content_container">
            <div class="block">
                <h1>Work Experience</h1>

                <blockquote class="profile_quote">

                    @foreach ($experience as $item)
                        <p> {{!! $item->head !!}}</p>
                        <p> {{!! $item->contents !!}}</p>
                    @endforeach
                    <span class="entypo-quote"></span>

                </blockquote>
            </div>



            <div class="block">
                <p>Patchama Raweesri.</p>
            </div>

            <div class="last block">


                <h2>Causes and problems</h2>
                <ul>
                    @foreach ($listExperience as $item)
                        <li>{{ $item->contents }}</li>
                    @endforeach

                </ul>
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
