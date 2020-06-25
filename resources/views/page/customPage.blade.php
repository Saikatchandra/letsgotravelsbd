@extends('layouts.user')

@section('head')
  <title>{{$item->title}}</title>
  @parent
@endsection

@section('contents')
    <div data-stellar-background-ratio="0.5" class="sub-banner overlay pb-0">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="#">{{$item->title}}</a></li>
        </ul>
        <h2 class="title font-100">{{$item->title}}</h2>
        <div class="search-bar-outer">
            <div class="search-bar">
                <div class="row">
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="input-field">
                            <input class="form-control" type="text" placeholder="DESTINATION">
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="input-field">
                            <input type="text" name="datetimes" placeholder="Calendar" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="input-field qty-box">
                            <div class="form-control">Guests <span class="qty-no th-bg"><input id="total" type="text" readonly value="1"></span></div>
                            <div class="qty-box-content">
                                <!-- Quantity Buttons -->
                                <div class="quantity-main">
                                    <label>Adults</label>
                                    <div class="quantity" data-target="amount-1">
                                        <button class="quantity-button quantity-up">+</button>
                                        <input type="number" id="amount-1" readonly value="1" min="1" max="300">
                                        <button class="quantity-button quantity-down">-</button>
                                    </div>
                                </div>
                                <div class="quantity-main">
                                    <label>Childrens</label>
                                    <div class="quantity" data-target="amount-2">
                                        <button class="quantity-button quantity-up">+</button>
                                        <input type="number" id="amount-2" readonly value="0" min="0" max="300">
                                        <button class="quantity-button quantity-down">-</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 col-sm-3">
                        <div class="input-field">
                            <input type="submit" value="&#8981; Search">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>   
    <!-- Oscar Contant Wrapper Start-->  
    <div class="main-contant"> 
        <!-- About Us Section 2 Start --> 
        <section class="about-style-3">
            <div class="container">
                <div class="row">
                    <div class="text">
                        <!-- SECTION HEADING START -->
                        {{-- <div class="section-heading text-center">
                            <h2 class="title">Who We Are</h2>
                            <h6 class="small-title">We are the best</h6>
                        </div> --}}
                        <!-- SECTION HEADING END -->
                        {!! $item->description !!}
                        {{-- <a class="btn" href="#">Read More</a> --}}
                    </div>
                </div>
            </div>    
        </section>
        <!-- About Us Section 2 End --> 
        <!-- Sevices Section Start -->
        <section class="gray-bg">
            <div class="container">
                <!-- SECTION HEADING START -->
                <div class="section-heading text-center">
                    <h2 class="title">Our Services</h2>
                    <h6 class="small-title">We are the best</h6>
                </div>
                <!-- SECTION HEADING END -->
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-bikini"></i></span>
                            <h6 class="title"><a href="#">Beach Party</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-big-hotel"></i></span>
                            <h6 class="title"><a href="#">Stay Service</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-airplane-1"></i></span>
                            <h6 class="title"><a href="#">Air Tickets</a></h6>                                
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-bicycle2"></i></span>
                            <h6 class="title"><a href="#">bike ride</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-hotel-bell"></i></span>
                            <h6 class="title"><a href="#">Dine</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-atomium"></i></span>
                            <h6 class="title"><a href="#">Epic journeys</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-africa-map"></i></span>
                            <h6 class="title"><a href="#">Tours Gide</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <!-- Simple Box Start -->
                        <div class="simple-box-2">
                            <span class="th-icon-box"><i class="icon-cruise"></i></span>
                            <h6 class="title"><a href="#">Endangered Wildlife</a></h6>
                        </div>
                        <!-- Simple Box End -->
                    </div>
                </div>
            </div>    
        </section>
        <!-- /Sevices Section End -->
        <!-- About Us Section Start --> 
        <section class="pb-0">
            <!-- SECTION HEADING START -->
            <div class="section-heading text-center">
                <h2 class="title">What We Do</h2>
                <h6 class="small-title">We are the best</h6>
            </div>
            <!-- SECTION HEADING END -->
            <div class="gray-bg about-caption d-flex align-items-center">
                <div class="col-md-6 col-sm-6">
                    <!-- MAIN PREVIEW START -->
                    <div class="bg-slider arrow-2">
                        <div class="thumb bg-thumb">
                            <img src="../assets/extra-images/slider-images/img-1.jpg" alt="">
                        </div>
                        <div class="thumb bg-thumb">
                            <img src="../assets/extra-images/slider-images/img-2.jpg" alt="">
                        </div>
                        <div class="thumb bg-thumb">
                            <img src="../assets/extra-images/slider-images/img-3.jpg" alt="">
                        </div>
                    </div>
                    <!-- MAIN PREVIEW END -->
                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- MAIN PREVIEW NAV START -->
                    <div class="text">
                        <h3 class="title f-50">Hotel Booking</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
                        <a href="#" class="btn large"><i class="fas fa-search"></i>Explore more</a>
                    </div>
                    <!-- MAIN PREVIEW NAV END -->
                </div>
            </div>
        </section>
        <!-- /About Us Section End --> 
        <!-- Counter Section Start -->
        <section>
            <!-- SECTION HEADING START -->
            <div class="section-heading text-center">
                <h3 class="title">Center Achievement</h3>
                <h6 class="small-title">We are the best</h6>
            </div>
            <!-- SECTION HEADING END -->
            <!-- Counter LIST START -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 red">
                            <i class="icon-support2"></i>
                            <h4>32,654</h4>
                            <h5>Customers</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 green">
                            <i class="icon-globe4"></i>
                            <h4>1021</h4>
                            <h5>DESTINATIONS</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 blue">
                            <i class="icon-bus-front-view-with-sign"></i>
                            <h4>20,096</h4>
                            <h5>TOURS</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                    <div class="col-md-3 hidden-sm">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 yellow">
                            <i class="icon-menu"></i>
                            <h4>150</h4>
                            <h5>TOUR TYPES</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                </div>
            </div>
            <!-- Counter LIST END -->
        </section>
        <!-- /Counter Section End -->
        <!-- Team Section Start -->
        <section>
            <div class="container">
                <!-- SECTION HEADING START -->
                <div class="section-heading text-center">
                    <h2 class="title">Meet Our Team</h2>
                    <h6 class="small-title">We are the best</h6>
                </div>
                <!-- SECTION HEADING END -->
                <!-- TEAM SLIDER START -->
                <div class="team_slider arrow-2 ">
                    <div>
                        <!-- TEAM BOX START -->
                        <div class="team-box">
                            <figure>    
                                <img src="../assets/extra-images/team/img-1.jpg" alt="">
                            </figure>
                            <div class="text">
                                <h4 class="title font-40"><a href="#">Saleena Williams</a></h4>
                                <div class="destination">Manager Assistent</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit. voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,.</p>
                                <ul class="social-list circule-box">
                                    <li><a class="facebook-bg" href="#"><i class="icon-facebook3"></i></a></li>
                                    <li><a class="twitter-bg" href="#"><i class="icon-twitter3"></i></a></li>
                                    <li><a class="linkedin-bg" href="#"><i class="icon-linkedin3"></i></a></li>
                                    <li><a class="google-bg" href="#"><i class="icon-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- TEAM BOX END -->
                    </div>
                    <div>
                        <!-- TEAM BOX START -->
                        <div class="team-box">
                            <figure>    
                                <img src="../assets/extra-images/team/img-2.jpg" alt="">
                            </figure>
                            <div class="text">
                                <h4 class="title font-40"><a href="#"> Williams Saleena</a></h4>
                                <div class="destination">Manager Assistent</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit. voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,.</p>
                                <ul class="social-list circule-box">
                                    <li><a class="facebook-bg" href="#"><i class="icon-facebook3"></i></a></li>
                                    <li><a class="twitter-bg" href="#"><i class="icon-twitter3"></i></a></li>
                                    <li><a class="linkedin-bg" href="#"><i class="icon-linkedin3"></i></a></li>
                                    <li><a class="google-bg" href="#"><i class="icon-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- TEAM BOX END -->
                    </div>
                    <div>
                        <!-- TEAM BOX START -->
                        <div class="team-box">
                            <figure>    
                                <img src="../assets/extra-images/team/img-3.jpg" alt="">
                            </figure>
                            <div class="text">
                                <h4 class="title font-40"><a href="#"> Williams</a></h4>
                                <div class="destination">Manager Assistent</div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit. voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,.</p>
                                <ul class="social-list circule-box">
                                    <li><a class="facebook-bg" href="#"><i class="icon-facebook3"></i></a></li>
                                    <li><a class="twitter-bg" href="#"><i class="icon-twitter3"></i></a></li>
                                    <li><a class="linkedin-bg" href="#"><i class="icon-linkedin3"></i></a></li>
                                    <li><a class="google-bg" href="#"><i class="icon-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- TEAM BOX END -->
                    </div>
                </div>
                <!-- TEAM SLIDER Start -->
            </div>    
        </section>
        <!-- /TeamSection End -->
        <!-- Brand Section Start -->
        <section class="gray-bg">
            <div class="container">
                <!-- SECTION HEADING START -->
                <div class="section-heading text-center">
                    <h2 class="title">Our Insvestorsur Team</h2>
                    <h6 class="small-title">We are the best</h6>
                </div>
                <!-- SECTION HEADING END -->
                <div class="row brand-slider">
                    <div class="col-md-2">
                        <div class="thumb">
                            <a href="#"><img src="../assets/extra-images/brand-img-1.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumb">
                            <a href="#"><img src="../assets/extra-images/brand-img-2.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumb">
                            <a href="#"><img src="../assets/extra-images/brand-img-3.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumb">
                            <a href="#"><img src="../assets/extra-images/brand-img-4.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumb">
                            <a href="#"><img src="../assets/extra-images/brand-img-5.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="thumb">
                            <a href="#"><img src="../assets/extra-images/brand-img-6.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>    
        </section>
        <!-- Brand Section End -->
    </div><!--/Main Contant End--> 
    @parent
@endsection

@section('foot')
    @parent
@endsection
