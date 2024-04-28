<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>skills</title>

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
                    <li><a class="no_border purple" href="{{ route('skills') }}">Skills</a></li>
                    <li><a href="{{ route('experience') }}">Work Experience</a></li>
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
                <!-- <img src="images/javier_latorre.jpg" alt="profile picture"> -->
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
            {{-- <a href="mailto:mp58154580164@gmail.com" class="send_message_button">
                <span class="cut1"></span>
                <span class="cut2"></span>
                <span class="content">Send me a message <span class="fontawesome-double-angle-right"></span></span>
            </a> --}}
            {{-- <div class="get_social_content">
                <h2>Get social</h2>
                <ul class="social_icons horizontal_list">
                    <li><a class="facebook" href="https://www.facebook.com/PatjamaRaweesri">
                            <span class="entypo-facebook-circled"></span>
                            <span class="invisible">Facebook</span>
                        </a>
                    </li>
                </ul>
            </div> --}}
            <!--<div class="get_social_content">
          <h2>Get social</h2>
          <ul class="social_icons horizontal_list">
            <li><a class="facebook" href="https://www.facebook.com/jlalovi"><span class="entypo-facebook-circled"></span><span class="invisible">Facebook</span></a></li>
            <li><a class="twitter" href="https://twitter.com/jlalovi"><span class="entypo-twitter-circled"></span><span class="invisible">Twitter</span></a></li>
            <li><a class="linkedin" href="https://www.linkedin.com/in/jlalovi/en"><span class="entypo-linkedin-circled"></span><span class="invisible">LinkedIn</span></a></li>
          </ul>
        </div>-->
        </div>
        <!-- PROFILE CONTENT -->
        <div id="content_container">
            <div class="block">
                <h2>Skills</h2>
                @for ($i = 0; $i < count($skills); $i++)
                    <blockquote class="profile_quote">
                        <p>{{ $skills[$i]->contents }}</p>
                        <span class="entypo-quote"></span>
                    </blockquote>
                @endfor
            </div>
            <div class="block">
                <p>Patchama Raweesri.</p>
            </div>
            <div class="block">

                <p></p>
            </div>
            <div class="horizontal_line">
                <div class="line_left"></div>
                <div class="left_circle"></div>
                <div class="central_circle"></div>
                <div class="right_circle"></div>
                <div class="line_right"></div>
            </div>
            <div class="block">
                <h2>SOFTSKILLS</h2>

                <div class="philosophy_content">

                    <ul>
                        @foreach ($listskills as $item)
                            @if ($item->head == 'softskills')
                                <li>{{ $item->contents }}</li>
                            @endif
                        @endforeach
                    </ul>

                    <div class="clear"></div>
                </div>
            </div>
            <div class="horizontal_line">
                <div class="line_left"></div>
                <div class="left_circle"></div>
                <div class="central_circle"></div>
                <div class="right_circle"></div>
                <div class="line_right"></div>
            </div>
            <div class="container">
                <div class="row">
                    <!-- First Column -->
                    <div class="col">
                        <div class="last block">

                            <h2>TECHNICAL SKILLS</h2>
                            <h2>Languages</h2>
                            <ul>
                                @foreach ($listskills as $item)
                                    @if ($item->head == 'Languages')
                                        <li>{{ $item->contents }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Second Column -->
                    <div class="col">
                        <div class="last block">
                            <h2>Framework/Libraries</h2>
                            <ul>
                                @foreach ($listskills as $item)
                                    @if ($item->head == 'Framework/Libraries')
                                        <li>{{ $item->contents }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Third Column -->
                    <div class="col">
                        <div class="last block">
                            <h2>Version Control & Tools</h2>
                            <ul>
                                @foreach ($listskills as $item)
                                    @if ($item->head == 'Version')
                                        <li>{{ $item->contents }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
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
