<!DOCTYPE html>
<html lang="zxx">
  <head>
        @section('head')
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
            <meta name="robots" content="index, follow" >
            <meta name="keywords" content="HTML5 Template, Themeforest, Business, Tranding, Top Theme Travelair, oscarthemes,Oscar Themes,Travelair" >
            <meta name="description" content="Discover Oscar Themes - Travelair HTML5 Template, Travel, adventure, booking, holiday, reservation, tour, tour agency, tour booking, tour management, tour operator, tour package, travel, travel agency, trip, vacation" >
            <meta name="theme-color" content="#009cff">
            <title>Home Travelair</title>
            <!-- FAVICONS -->
            <link rel="shortcut icon" href="{{ asset('/contents/oscarthemes/images/favicon/favicon.png') }}">
            <link rel="apple-touch-icon" href="{{ asset('/contents/oscarthemes/images/favicon/apple-touch-icon.png') }}">
            <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('/contents/oscarthemes/images/favicon/apple-touch-icon-72x72.png') }}">
            <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('/contents/oscarthemes/images/favicon/apple-touch-icon-114x114.png') }}">
            <link rel="icon" sizes="192x192" href="{{ asset('/contents/oscarthemes/images/favicon/icon-192x192.png') }}">
            <!--  GOOGLE FONT -->
            <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,600,700,900" rel="stylesheet">
            <!-- Bootstrap -->
            <link href="{{ asset('/contents/oscarthemes/css/bootstrap.css') }}" rel="stylesheet">
            <!-- Animate CSS -->
            <link href="{{ asset('/contents/oscarthemes/css/animate.css') }}" rel="stylesheet">
            <!-- Magnific Popup CSS -->
            <link href="{{ asset('/contents/oscarthemes/css/magnific-popup.css') }}" rel="stylesheet">
            <!-- Slick Slider CSS -->
            <link href="{{ asset('/contents/oscarthemes/css/slick.css') }}" rel="stylesheet">
            <!-- Date Picker CSS -->
            <link href="/contents/oscarthemes/css/daterangepicker.css" rel="stylesheet">
            <!-- Typography CSS -->
            <link href="{{ asset('/contents/oscarthemes/css/typography.css') }}" rel="stylesheet">
            <!-- Flat Icon CSS -->
            <link href="{{ asset('/contents/oscarthemes/svg.css') }}" rel="stylesheet">
            <!-- Short Code CSS -->
            <link href="{{ asset('/contents/oscarthemes/css/shortcode.css') }}" rel="stylesheet">
            <!-- Widget Css -->
            <link href="{{ asset('/contents/oscarthemes/css/widget.css') }}" rel="stylesheet">
            <!--Dl Menu Script-->
            <link href="{{ asset('/contents/oscarthemes/css/dl-menu/component.css') }}" rel="stylesheet">
            <!-- Custom Style CSS -->
            <link href="{{ asset('/contents/oscarthemes/style.css') }}" rel="stylesheet">
            <!-- Color CSS -->
            <link href="/contents/oscarthemes/css/color.css" rel="stylesheet">
            <!-- Responsive CSS -->
            <link href="/contents/oscarthemes/css/responsive.css" rel="stylesheet">
            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111517361-2"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-111517361-2');
            </script>
        @show
    </head>
    <body class="modren-layout parallax-section" data-stellar-background-ratio="0.5">
        <!-- LOADER -->
        <div id="loader-overflow">
            <div id="loader3" class="loader-cont">Please enable JS</div>
        </div>
        
        <div class="main-wrapper">
            <header id="header" class="header-2">
                <!-- TOP BAR START -->
                <div class="top-bar">
                    <div id="cd-search" class="cd-search">
                        <form class="form-search" id="searchForm" action="http://oscarthemes.com/html/travelair/modren-layout/page-search-results.html" method="get">
                            <input class="form-control" value="" name="q" id="q" placeholder="Search..." type="text">
                        </form>
                    </div>
                    <div class="search-box hidden-sm hidden-xs">
                        <!-- SEARCH READ DOCUMENTATION -->
                        <div class="cd-search-trigger"><span></span></div><!-- cd-header-buttons -->
                        <div class="contact-no">
                            <i class="icon-smartphone4"></i>
                            <span> {{ $companyconfig[0]->phone_number1??null }} </span>

                        </div>
                    </div>
                </div>
                <!-- TOP BAR END -->
                <div class="navigation-outer">
                    <div class="container">
                        <div class="logo" id="logo">
                            {{-- Logo Add by Ajax Call --}}
                        </div>
                        <!--Navigation Start -->
                        <nav class="navigation">
                            <ul>
                                <li class="active">
                                    <a href="{{route('welcome')}}">Home</a>
                                </li>
                                <li><a href="{{route('aboutUs')}}">About us</a></li>
                                <li>
                                    <a href="#">Hajj&Umrah</a>
                                    <ul class="children">
                                        <li><a href="{{route('hajjHome')}}">Hajj</a></li>
                                        <li><a href="{{route('umrahHome')}}">Umrah</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a >Our Services</a>
                                    <ul class="children">
                                        <li><a href="{{route('airTicketHome')}}">Air Ticket</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Visa Processing</a></li>
                                        <li><a href="{{route('showTour')}}">Tours Package</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Hotel Reservation</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Ship Ticket</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Student Consultancy</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Bus Ticket </a></li>
                                        <li><a href="{{route('showTour')}}">Corporate Tour</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">Packages</a>
                                    <ul class="children">
                                        <li><a href="{{route('domesticPackage')}}">Domestic</a></li>
                                        <li><a href="{{route('internationalPackage')}}">International</a></li>
                                        {{-- @foreach ($packages as $package)
                                        
                                        @endforeach --}}
                                    </ul>
                                </li>

                                <li><a href="{{route('gallery')}}">Our Gallery</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                                <li><a href="{{route('contactUs')}}">Contact us</a></li>
                                {{-- <li>
                                    <a href="#">More</a>
                                    <ul class="children" id="more">
                                        link list add by ajax call
                                    </ul>
                                </li> --}}
                            </ul>
                        </nav>
                        <!--Navigation End -->
                        <!--DL Menu Start-->
                        <div id="responsive-navigation" class="dl-menuwrapper">
                            <button class="dl-trigger">
                                <span class="close-icon">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </span>
                            </button>
                            <ul class="dl-menu">
                                <li class="menu-item parent-menu">
                                    <a href="{{route('welcome')}}">Home</a>
                                </li>
                                <li><a href="{{route('aboutUs')}}">About us</a></li>
                                <li class="menu-item parent-menu">
                                    <a href="#">Hajj&Umrah</a>
                                    <ul class="dl-submenu">
                                        <li><a href="{{route('hajjHome')}}">Hajj</a></li>
                                        <li><a href="{{route('umrahHome')}}">Umrah</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item parent-menu">
                                    <a href="#">Our Services</a>
                                    <ul class="dl-submenu">
                                        <li><a href="{{route('airTicketHome')}}">Air Ticket</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Visa Processing</a></li>
                                        <li><a href="{{route('showTour')}}">Tours Package</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Hotel Reservation</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Ship Ticket</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Student Consultancy</a></li>
                                        <li><a href="{{route('airTicketHome')}}">Bus Ticket </a></li>
                                        <li><a href="{{route('showTour')}}">Corporate Tour</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item parent-menu">
                                    <a href="#">Packages</a>
                                    <ul class="dl-submenu">
                                        <li><a href="{{route('domesticPackage')}}">Domestic</a></li>
                                        <li><a href="{{route('internationalPackage')}}">International</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('contactUs')}}">Our Gallery</a></li>

                                <li><a href="{{route('contactUs')}}">Contact Us</a></li>

                                {{-- <li class="menu-item parent-menu">
                                    <a href="#">More</a>
                                    <ul class="dl-submenu" id="moreInFooter">
                                        link list add by ajax call
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                        <!--DL Menu END-->
                        <div class="cd-search-trigger visible-sm visible-xs"><span></span></div><!-- cd-header-buttons -->
                    </div>
                </div>
            </header><!-- /header 2 -->
            <hr>

            @section('contents')

            <!-- News Letter Item Start -->
            <div class="section overlay newsletter-widget">
                <div class="container">
                    <!-- SECTION HEADING START -->
                    <div class="section-heading text-center">
                        <h3 class="title">Join Us Today</h3>
                        <h6 class="small-title">We are the best</h6>
                        <p id="subscriptionDivision"></p>
                    </div>
                    <!-- SECTION HEADING END -->
                    <div id="mc_embed_signup" class="input-field nl-form-container clearfix">
                        <form action="/subscribe" class="newsletterform validate">
                            <input
                                maxlength="100"
                                value=""
                                type="email"
                                name="email"
                                id="mce-EMAIL"
                                maxlength="32"
                                placeholder="Email address"
                                class="email form-control nl-email-input"
                                required>
                            {{-- <div style="position: absolute; left: -5000px;">
                                <input
                                    type="text"
                                    name="b_ba37086d08bdc9f56f3592af0_e38247f7cc"
                                    tabindex="-1"
                                    value="">
                            </div> --}}
                            <label class="mb-0">
                                <input class="font-16 rounded-100 ps-middle"  type="submit" value="Submit">
                            </label>
                        </form>
                        <div id="notification_container"></div>
                    </div><!-- /Input Field End-->
                </div>
            </div>
            <!-- / News Letter Item End -->

            <!-- Footer Start-->
            <footer class="th-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-6">
                            <!--Widget Navigation Start-->
                            <div class="widget widget-about">
                                <h6 class="widget-title">About Us</h6>
                                <p id="aboutUs"></p>
                                <ul class="contact-list">
                                    <li><i class="icon-house"></i><span id="address"></span></li>
                                    <li><i class="icon-phone-call"></i><span id="phoneNumber"></span></li>
                                    <li><i class="icon-email"></i><span id="email"></span></li>
                                </ul>
                            </div>
                            <!--Widget Navigation End-->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!--Widget Navigation Start-->
                            <div class="widget widget_nav_menu">
                                <h6 class="widget-title">navigate</h6>
                                <ul>
                                    <li><a href="{{route('welcome')}}">Home</a></li>
                                    <li><a href="{{route('aboutUs')}}">about us</a></li>
                                    <li><a href="{{route('gallery')}}">Our Gallery</a></li>
                                    <li><a href="{{route('blog')}}">Blog</a></li>
                                    <li><a href="{{route('contactUs')}}">contact us</a></li>
                                </ul>
                            </div>
                            <!--Widget Navigation End-->
                        </div>
                        <div class="col-md-3 col-sm-6">
                            <!--Widget Navigation Start-->
                            <div class="widget widget_nav_menu">
                                <h6 class="widget-title">information</h6>
                                <ul>
                                    <li><a href="#">FAQ</a></li>
                                    <li><a href="#">Exploore more</a></li>
                                    <li><a href="#">privacy policy</a></li>
                                    <li><a href="#">terms of services</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                </ul>
                            </div>
                            <!--Widget Navigation End-->
                        </div>
                       {{--  <div class="col-md-3 col-sm-6">
                            <!--Widget Navigation Start-->
                            <div class="widget widget_testimonial">
                                <div class="testimonial">
                                    <div class="text">
                                        <p>prices and availability of the right flights has greatly
                                        improved since switching over! I appreciate Max always being available
                                        to take my emails or calls. Keep up the good work!</p>
                                        <div class="text-center">
                                            <div class="rating_down">
                                                <div style="width: 40%;" class="rating_up"></div>
                                            </div>
                                        </div>
                                        <a class="user-title" href="#">Andrea Ori</a>
                                    </div>
                                    <div class="text">
                                        <p>prices and availability of the right flights has greatly
                                        improved since switching over! I appreciate Max always being available
                                        to take my emails or calls. Keep up the good work!</p>
                                        <div class="text-center">
                                            <div class="rating_down">
                                                <div style="width: 80%;" class="rating_up"></div>
                                            </div>
                                        </div>
                                        <a class="user-title" href="#">Andrea Ori</a>
                                    </div>
                                    <div class="text">
                                        <p>prices and availability of the right flights has greatly
                                        improved since switching over! I appreciate Max always being available
                                        to take my emails or calls. Keep up the good work!</p>
                                        <div class="text-center">
                                            <div class="rating_down">
                                                <div style="width: 50%;" class="rating_up"></div>
                                            </div>
                                        </div>
                                        <a class="user-title" href="#">Andrea Ori</a>
                                    </div>
                                </div>
                            </div>
                            <!--Widget Navigation End-->
                        </div> --}}
     <div class="col-md-3 col-sm-6">
        <div class="widget widget_nav_menu">
         <h6 class="widget-title">Connect Us </h6>
          <ul class="widget widget_testimonial">
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                 <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                  <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
              </a>
            </li>
            <li class="">
              <a href="#">
                <span class="fa-stack fa-lg">
                   <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
              </a>
            </li>
          </ul>
          
        </div>
    </div>
    </div>
                </div>
            </footer>
            <!-- Footer End-->

            <div class="copy-right th-bg">
                <div class="container">
                 <p class="pull-left"><i class="fa fa-copyright"></i><span>2019               {{ $companyconfig[0]->company_name??null }} </span></p>
                    
                    <p class="pull-right">Designed By: <a target="_blank" href="https://www.smartsoftware.com.bd/">Smart Software Ltd.</a></p>
                </div>
            </div>
            @show
        </div>
        

        @section('foot')
            <script src="/contents/oscarthemes/js/jquery.js"></script>
            <!-- bootstrap -->
            <script src="/contents/oscarthemes/js/bootstrap.js"></script>
            <!-- Slick Slider -->
            <script src="/contents/oscarthemes/js/slick.min.js"></script>
            <!-- Popup Js -->
            <script src="/contents/oscarthemes/js/magnific-popup.js"></script>
            <!-- Dll Menu Js -->
            <script src="/contents/oscarthemes/js/dl-menu/modernizr.custom.js"></script>
            <script src="/contents/oscarthemes/js/dl-menu/jquery.dlmenu.js"></script>
            <!-- Fontawesome Js -->
            <script src="/contents/oscarthemes/js/fontawesome.js"></script>
            <!-- Date Picker -->
            <script type="text/javascript" src="/contents/oscarthemes/js/moment.min.js"></script>
            <script type="text/javascript" src="/contents/oscarthemes/js/daterangepicker.min.js"></script>
            <!-- Map Api Library -->
            <script src="http://maps.google.com/maps/api/js?key=AIzaSyDbj_PE71ocTwX_MVhtTXrDJ3p61HvV018"></script>
            <!-- Google Map Js -->
            <script src="/contents/oscarthemes/js/gmap3.min.js"></script>
            <!-- Input Number Js -->
            <script src="/contents/oscarthemes/js/input-number.js"></script>
            <!--Custom Script-->
            <script src="/contents/oscarthemes/js/custom.js"></script>
            
            <script>
                $(document).ready(function () {
                    // $.ajax({
                    //     type: "Get",
                    //     url : "{{route('fetchSlug')}}",
                    //     success : function(data){
                    //         // $('#houseCount').html('<p style="color: black; font-size: 16px" id = "houseCount"> '+ data[0] + ' houses found</p>');
                    //         data.forEach(element => {
                    //             $("#more").append('<li><a href="/'+element.slug+'">'+element.title+'</a></li>');
                    //             $("#moreInFooter").append('<li><a href="/'+element.slug+'">'+element.title+'</a></li>');
                    //         });
                    //         // console.log(data);
                    //     }
                    // });

                    $.ajax({
                        type: "Get",
                        url : "{{route('fetchCompanyConfiguration')}}",
                        success : function(data){
                            $("#logo").append('<img src="/contents/images/companyLogo/'+data.logo+'" height="60" width="215" alt="">');
                            $("#aboutUs").append(data.short_about_us);
                            $("#address").append(data.address);
                            $("#phoneNumber").append(data.phone_number1);
                            $("#email").append(data.email);
                            
                        }
                    });

                    $.ajax({
                        type: "Get",
                        url : "{{route('fetchSubscriptionDivision')}}",
                        success : function(data){
                            $("#subscriptionDivision").html(data.text);
                            console.log(data);
                        }
                    });
                });
            </script>
        @show
    </body>
</html>
