@extends('layouts.user')

@section('head')
  <title>Blog</title>
  @parent
@endsection

@section('contents')
    <div data-stellar-background-ratio="0.5" class="sub-banner overlay pb-0">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="#">Blog</a></li>
        </ul>
        <h2 class="title font-100">BLog</h2>
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
                    
                    @foreach ($items as $item)
                        <div class="col-md-4 col-sm-6">
                            <!-- Blog Thumb Start -->
                            <div class="thinn-blog-thumb thinn-blog-grid mb-30" style="min-height: 525px;">
                                <figure>
                                    <img src="/contents/images/blog/{{$item->image}}" alt="" height="268px"> 
                                </figure>
                                <div class="text">
                                    <div class="date-box-holder">
                                        <div class="title-holder">
                                            <h5 class="title font-18"><a href="blog-detail.html">{{$item->title}}</a></h5>
                                            <ul class="blog-meta">
                                                <li>
                                                    <i class="icon-user"></i>
                                                    <a href="#">Admin</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="date-box">
                                            <strong class="font-50">{{$item->created_at->format('d')}}</strong>
                                            <strong class="font-18">{{$item->created_at->format('F')}}</strong>
                                        </div>
                                    </div>
                                    <p>{!! str_limit(strip_tags($item->description), 50) !!}</p>
                                    <a class="btn btn-2" href="{{route('blogPostDetails', ['id' => $item->id])}}">View detail</a>
                                </div>
                            </div>
                            <!-- /Blog Thumb End -->
                        </div>
                    @endforeach
                    
                    <div class="col-md-12">
                        <!-- Pagination Start-->
                        <div class="thinn-pagination text-center">
                            {{ $items->links() }} 
                        </div>
                        <!-- Pagination End-->
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
