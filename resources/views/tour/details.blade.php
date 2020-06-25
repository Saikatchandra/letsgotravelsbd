@extends('layouts.user')

@section('head')
  <title>Tour</title>
  @parent
@endsection

@section('contents')
    <div data-stellar-background-ratio="0.5" class="sub-banner overlay pb-0">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="#">Hajj</a></li>
        </ul>
        <h2 class="title font-100">Hajj</h2>
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
    <div class="main-contant"> 
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-detail-section">
                            <div class="image-holder">
                                <figure>
                                    <img src="/contents/images/tour/{{$details->image}}" alt=""/>
                                </figure>
                                <h2 class="title detail-title font-26">{{$details->title}}</h2>
                                <ul class="blog-meta">
                                    <li>
                                        <i class="icon-calendar-1"></i>
                                        <a href="#">{{$details->days}}</a>
                                    </li>
                                    <li>
                                        <i class="icon-calendar5"></i>
                                        <a href="#">Availability : {{$details->available_from}} - {{$details->available_to}}</a>
                                    </li>
                                    <li>
                                        <i class="icon-location"></i>
                                        <a href="#">{{$details->where}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- BLOG TEXT DETAIL HOLDER -->
                            <div class="text">
                                <p>{{$details->description}}</p>
                                {{-- <blockquote>
                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat </p>
                                </blockquote> --}}
                            </div>
                            <!-- BLOG TEXT DETAIL HOLDER END -->
                            <div class="share-post th-bg">
                                <span class="font-20 pull-left">Share this post</span>
                                <ul class="social-list">
                                    <li> 
                                        <a class="fb-btn" title="Facebook" href="#"><i class="icon-facebook3"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter-btn" title="Twitter" href="#"> <i class="icon-twitter3"></i> </a> 
                                    </li>
                                    <li> 
                                        <a class="google-btn" title="Google Bookmark" href="#"> <i class="icon-googleplus"></i> </a> 
                                    </li> 
                                    <li>
                                        <a class="all-networks" href="#"> <i class="icon-linkedin3"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <!--Asidebar Start-->
                        <aside class="sidebar">
                            <div class="widget widget_categories">
                                <h5 class="widget-title">Facilities</h5><!--/Widget Title End-->
                                <ul>
                                    <li><a href="#">Grow Your Business</a></li>
                                    <li><a href="#">Interview</a></li>
                                    <li><a href="#">Marketing</a></li>
                                    <li><a href="#">Productivity</a></li>
                                    <li><a href="#">Social Media</a></li>
                                    <li><a href="#">Start Your Business</a></li>
                                    <li><a href="#">Uncategorized</a></li>
                                </ul>
                            </div><!--/ Widget Categories End-->
                            <div class="widget widget_text">
                                <h5 class="widget-title">Facilities</h5><!--/Widget Title End-->
                                <div class="textwidget">
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.
                                        Facilis ipsum reprehenderit nemo.</p>
                                    <img src="/contents/oscarthemes/extra-images/text-widget-img.jpg" alt="">
                                    <p>Dignissimos asperiores vitae velit veniam totam fuga molestias accusamus alias autem provident. Odit ab aliquam dolor eius.
                                        Facilis ipsum reprehenderit nemo.</p>
                                </div>
                            </div>
                        </aside>
                        <!--Asidebar End-->
                    </div>
                </div>
            </div><!-- / Container -->
        </div><!-- /Blog Grid Section -->
    </div><!-- /Main Contant End -->
    @parent
@endsection

@section('foot')
    @parent
@endsection
