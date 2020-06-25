@extends('layouts.user')

@section('head')
  <title>News & Update Post</title>
  @parent
@endsection

@section('contents')
    <div data-stellar-background-ratio="0.5" class="sub-banner overlay pb-0">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="{{route('blog')}}">Blog</a></li>
            <li><a href="#">Post</a></li>
        </ul>
        <h2 class="title font-100">News & Update Post</h2>
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
                                    <img src="/contents/images/newsAndUpdate/{{$item->image}}" alt=""/>
                                </figure>
                                <h2 class="title detail-title font-26">{{$item->title}}</h2>
                                <ul class="blog-meta">
                                    <li>
                                        <i class="icon-calendar5"></i>
                                        <a href="#">Post Date and Time : {{$item->created_at}}</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- BLOG TEXT DETAIL HOLDER -->
                            <div class="text">
                                <p>{!! $item->description !!}</p>
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
                            <div class="widget widget_text">
                                <h5 class="widget-title">Next Post</h5><!--/Widget Title End-->
                                <div class="textwidget">
                                    @if($nextItem)
                                        <p>{{$nextItem->title}}</p>
                                        <img src="/contents/images/blog/{{$nextItem->image}}" alt="">
                                        <p>{!! str_limit(strip_tags($nextItem->description), 100) !!}</p>
                                        <a class="btn btn-2" href="{{route('newsUpdatePostDetails', ['id' => $nextItem->id])}}">View detail</a>
                                    @else
                                        <p>There has no Next Post</p>
                                    @endif
                                </div>
                            </div>

                            <div class="widget widget_text">
                                <h5 class="widget-title">Previous Post</h5><!--/Widget Title End-->
                                <div class="textwidget">
                                    @if($previousItem)
                                        <p>{{$previousItem->title}}</p>
                                        <img src="/contents/images/blog/{{$previousItem->image}}" alt="">
                                        <p>{!! str_limit(strip_tags($previousItem->description), 100) !!}</p>
                                        <a class="btn btn-2" href="{{route('newsUpdatePostDetails', ['id' => $previousItem->id])}}">View detail</a>
                                    @else
                                        <p>There has no Previous Post</p>
                                    @endif
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
