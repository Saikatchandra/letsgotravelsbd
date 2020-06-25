@extends('layouts.user')

@section('head')
  <title>{{ $companyconfig[0]->company_name }}</title>
  @parent
@endsection

{{-- @section('addTour')
  active
@endsection --}}

@section('contents')
    <div class="main-banner">
        <div class="slider arrow-2">
            @foreach ($slider as $item)
                <div>
                    <img height="450px" width="1920px" src="contents/images/slider/{{ optional($item)->image??null }}" alt="oscarthemes">
                    <div class=" banner-caption-wrapper text-center">
                        <div class="container">
                            <div class="banner-caption caption-style-1">
                                <h6 class="title small-title">{{$item->title1??null}}</h6>
                                <div class="clear"></div>
                                <h5 data-animation="fadeInUp" data-delay="0.3s" class="title title-medium">{{ $item->title2??null }}</h5>
                                <a href="#" data-animation="fadeInUp" data-delay="1.3s" class="btn large" tabindex="0"><i class="fas fa-search"></i> dicover you top destination</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            
        </div><!-- /Main Banner -->
        
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
                                    <label>Children</label>
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
    </div><!-- /Banner Wrap -->
    <!-- Oscar Contant Wrapper Start-->
    <div class="main-contant">
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
                        @foreach (explode('|', optional($aboutUsSection1)->images) as $image)
                            <div class="thumb bg-thumb">
                                <img src="/contents/images/aboutUs/aboutUsSection1/{{$image}}" height="512px" alt="">
                            </div>
                        @endforeach
                    </div>
                    <!-- MAIN PREVIEW END -->

                </div>
                <div class="col-md-6 col-sm-6">
                    <!-- MAIN PREVIEW NAV START -->
                    <div class="text">
                        <h3 class="title f-50">{{ optional($aboutUsSection1)->title }}</h3>
                        <p>{!! str_limit( optional($aboutUsSection1)->about_us, 300) !!}</p>
                        {{-- <a href="{{route('aboutUsBySection', ['section', $aboutUsSection1->id])}}" class="btn large">Explore more</a> --}}
                        <a href="{{route('aboutUs')}}" class="btn large">Explore more</a>
                    </div>
                    <!-- MAIN PREVIEW NAV END -->
                </div>
            </div>
        </section>
        <!-- /About Us Section End -->
        <!-- Tours Section Start -->
        <section>
            <div class="col-md-10 col-sm-12 col-md-offset-2">
                <!-- SECTION HEADING START -->
                <div class="section-heading text-left">
                    <h3 class="title">Best Holiday Packages</h3>
                    <h6 class="small-title">We are the best</h6>
                </div>
                <!-- SECTION HEADING END -->
                <div class="list-slider arrow-2">
                    @foreach ($tourDetails as $tourDetail)
                        <div class="col-md-4 col-sm-6">
                            <!-- HOLIDAY PACKAGES START -->
                            <div class="thinn-tours-grid2 mb-30">
                                <figure>
                                    <img height="268px" width="364px" src="/contents/images/tour/{{$tourDetail->image}}" alt=""/>
                                    <span class="price-tag th-bg">{{$tourDetail->price??null}}TK</span>
                                </figure>
                                <div class="text">
                                    <ul class="blog-meta">
                                        <li><i class=" icon-calendar-1"></i><a href="#">{{$tourDetail->days??null}}</a></li>
                                    </ul>
                                    <ul class="blog-meta">
                                        <li><a href="#">Availability: {{$tourDetail->available_from??null}} - {{$tourDetail->available_to??null}}</a></li>
                                    </ul>
                                    <h5 class="title"><a href="#">{{$tourDetail->title??null}}</a></h5>
                                    <span class="location-tag"><i class="fa fa-map-marker" style="color:#0054A6"></i>&nbsp;{{$tourDetail->where??null}}</span>
                                    <p>{{str_limit($tourDetail->description??null, 150)}}</p>
                                    <a href="{{route('tourDetails', ['id' => $tourDetail->id])}}" class="btn">View detail</a>
                                </div>
                            </div>
                            <!-- HOLIDAY PACKAGES END -->
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
        <!-- /Tours Section End -->
        <!-- Explore us Section Start -->
        <div class="explor-us-section gray-bg d-flex">
            <!-- EXPLORE TEXT START -->
            <div class="explore-text text align-self-center text-right">
                <h5 class="title f-50">{{ optional($aboutUsSection2)->title??null }}</h5>
                <p>{!! optional($aboutUsSection2)->about_us??null !!}</p>
            </div>
            <!-- EXPLORE TEXT END -->
            <!-- EXPLORE THUMB START -->
            <div class="explore-thumb overlay thumb">
                <img src="/contents/images/aboutUs/aboutUsSection2/{{ optional($aboutUsSection2)->images }}" height="774"/>
                <div class="explor-map">
                    <h3>{{ optional($aboutUsSection2)->title }}</h3>
                    {{-- <h2>Asia</h2> --}}
                    <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3027.481692075607!2d-73.78032778444181!3d40.641311079339694!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c26650d5404947%3A0xec4fb213489f11f0!2sJohn+F.+Kennedy+International+Airport!5e0!3m2!1sen!2s!4v1526891811523" class="btn th-bg th-bdr popup-gmaps">Open map</a>
                </div>
            </div>
            <!-- EXPLORE THUMB END -->
        </div>
        <!-- /Explore us Section End -->
        <!-- Counter Section Start -->
        <section class="counter-wrap">
            <!-- SECTION HEADING START -->
            <div class="section-heading text-center">
                <h3 class="title">Our Achievement</h3>
                <h6 class="small-title">We are the best</h6>
            </div>
            <!-- SECTION HEADING END -->
            <!-- Counter LIST START -->
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 red">
                            <i class="icon-support2"></i>
                            <h4>32,654</h4>
                            <h5>Customers</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 green">
                            <i class="icon-globe4"></i>
                            <h4>1021</h4>
                            <h5>DESTINATIONS</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <!-- COUNTER THUMB START -->
                        <div class="counter-thumb style-2 blue">
                            <i class="icon-bus-front-view-with-sign"></i>
                            <h4>20,096</h4>
                            <h5>TOURS</h5>
                        </div>
                        <!-- COUNTER THUMB END -->
                    </div>
                    <div class="col-md-3 col-sm-3 col-xs-6">
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
        <!-- Top Destination Section Start -->
        <section class="gray-bg">
            <div class="container">
                <!-- SECTION HEADING START -->
                <div class="section-heading text-center">
                    <h3 class="title">Top Destinations</h3>
                    <h6 class="small-title">We are the best</h6>
                </div>
                <!-- SECTION HEADING END -->
                <div class="destination-slider arrow-2">

                    <!-- TOP DESTINATION START -->
                    @foreach ($tourDetails as $item)
                        <div class="top-destination">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="thumb">
                                        <img src="contents/images/tour/{{$item->image??null}}" height="556px" alt="">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="text">
                                        <h5 class="title">{{$item->where??null}}</h5>
                                        <p>{!! str_limit($item->description??null, 250) !!}</p>
                                        <a href="{{route('tourDetails', ['id' => $item->id])}}" class="btn">Keep reading</a>
                                        <a href="{{route('tourDetails', ['id' => $item->id])}}" class="btn th-bg th-bdr">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- TOP DESTINATION END -->
                    
                </div>
            </div>
        </section>
        <!-- /Top Destination Section End -->
        <!-- Blog Section Start -->
        <section>
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="title">From The blog </h2>
                    <h6 class="small-title">We are the best</h6>
                </div><!-- / Section Heading -->
                <div class="row">
                 @foreach($blogs as $item)
                    <div class="col-md-4 col-sm-6">
                        <!-- Blog Thumb Start -->
                        <div class="thinn-blog-thumb thinn-blog-grid mb-30">
                            <figure>
                               <img src="contents/images/blog/{{$item->image??null}}" alt="">
                            </figure>
                            <div class="text">
                                <div class="date-box-holder">
                                    <div class="title-holder">
                                        <h5 class="title font-18"><a href="blog-detail.html">{{ $item->title??null }}</a></h5>
                                        <ul class="blog-meta">
                                            <li>
                                                <i class="icon-user"></i>
                                                <a href="#">{{ Auth::user()->name }} </a>
                                            </li>
                                            <li>
                                                <i class="icon-comment"></i>
                                                <a href="#">236</a>
                                            </li>
                                            <li>
                                                <i class="icon-eye"></i>
                                                <a href="#">456</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="date-box">
                                        <strong class="font-50">{{ $item->created_at->format('d') }}</strong>
                                        <strong class="font-18">{{ $item->created_at->format('M') }}</strong>
                                    </div>
                                </div>
                                <p>{{$item->description??null}}</p>
                                <a class="btn btn-2" href="{{route('blogPostDetails', ['id' => $item->id])}}">View detail</a>
                            </div>
                        </div>
                        <!-- /Blog Thumb End -->
                    </div>
                @endforeach
                    
                </div>
            </div><!-- / Container -->
        </section>
        <!-- /Blog Section End -->
        <!-- Gallery Section Start -->
        <section class="pd-0 gallery-slider-wrap">
            <div class="row ">
                <div class="col-md-10 col-sm-12">
                    
                    <ul class="gallery-slider arrow-2">
                        @foreach ($photoGallery as $item)
                            <li class="col-md-3 col-sm-4">
                                <!-- GALLERY THUMB START -->
                                <div class="gallery-thumb th-bg">
                                    <figure>
                                        <img height="268px" width="364px" src="contents/images/photoGallery/{{$item->image??null}}" alt=""/>
                                        {{-- <figcaption>
                                            <a href="#">Bali, Indonesia</a>
                                        </figcaption> --}}
                                    </figure>
                                </div>
                                <!-- GALLERY THUMB END -->
                            </li>
                        @endforeach
                        
                    </ul>
                </div>
                <div class="col-md-2 hidden-sm hidden-xs">
                    <!-- SECTION HEADING START -->
                    <div class="section-heading text-center mb-0">
                        <h3 class="title">Photo Gallery</h3>
                    </div>
                    <!-- SECTION HEADING END -->
                </div>
            </div>
        </section>
        <!-- /Gallery Section End -->
        <!-- News Section Start -->
        <section class="news-section gray-bg overlay">
            <div class="container">
                <div class="section-heading text-center">
                    <h2 class="title">News & Updates</h2>
                    <h6 class="small-title">We are the best</h6>
                </div><!-- / Section Heading -->
                <div class="news-slider arrow-2">
                    @foreach($newsAndUpdates as $item)
                    <div>
                        <!-- Blog Thumb Start -->
                        <div class="thinn-blog-thumb thinn-news thinn-blog-list">
                            <figure>
                                <img src="contents/images/newsAndUpdate/{{ $item->image??null }}" alt="">
                            </figure>
                            <div class="text">
                                <h5 class="title font-24"><a href="blog-detail.html">{{ $item->title??null }}</a></h5>
                                <ul class="blog-meta">
                                    <li>
                                        <i class="icon-user"></i>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <i class="icon-comment"></i>
                                        <a href="#">236</a>
                                    </li>
                                    <li>
                                        <i class="icon-eye"></i>
                                        <a href="#">456</a>
                                    </li>
                                </ul>
                                <p>{{ $item->description??null }} </p>
                                <a class="btn btn-2" href="{{route('newsUpdatePostDetails', ['id' => $item->id])}}">View detail</a>
                            </div>
                        </div>
                        <!-- /Blog Thumb End -->
                    </div>
                   {{--  <div>
                        <!-- Blog Thumb Start -->
                        <div class="thinn-blog-thumb thinn-news thinn-blog-list">
                            <figure>
                                <img src="contents/oscarthemes/extra-images/blog/blog-list/img-1.jpg" alt="">
                            </figure>
                            <div class="text">
                                <h5 class="title font-24"><a href="blog-detail.html">1 – Explore the world with a backpack</a></h5>
                                <ul class="blog-meta">
                                    <li>
                                        <i class="icon-user"></i>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <i class="icon-comment"></i>
                                        <a href="#">236</a>
                                    </li>
                                    <li>
                                        <i class="icon-eye"></i>
                                        <a href="#">456</a>
                                    </li>
                                </ul>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis </p>
                                <a class="btn btn-2" href="#">View detail</a>
                            </div>
                        </div>
                        <!-- /Blog Thumb End -->
                    </div>
                    <div>
                        <!-- Blog Thumb Start -->
                        <div class="thinn-blog-thumb thinn-news thinn-blog-list">
                            <figure>
                                <img src="contents/oscarthemes/extra-images/blog/blog-list/img-1.jpg" alt="">
                            </figure>
                            <div class="text">
                                <h5 class="title font-24"><a href="blog-detail.html">3 – Explore the world with a backpack</a></h5>
                                <ul class="blog-meta">
                                    <li>
                                        <i class="icon-user"></i>
                                        <a href="#">Admin</a>
                                    </li>
                                    <li>
                                        <i class="icon-comment"></i>
                                        <a href="#">236</a>
                                    </li>
                                    <li>
                                        <i class="icon-eye"></i>
                                        <a href="#">456</a>
                                    </li>
                                </ul>
                                <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute irure dolor quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis aute.Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat duis </p>
                                <a class="btn btn-2" href="#">View detail</a>
                            </div>
                        </div>
                        <!-- /Blog Thumb End --> --}}
                    @endforeach    
                    </div>
                </div>
            </div><!-- / Container -->
        </section>
        <!-- /News Section End -->
    </div><!--/Main Contant End-->
    
    @parent
@endsection

@section('foot')
    @parent
@endsection
