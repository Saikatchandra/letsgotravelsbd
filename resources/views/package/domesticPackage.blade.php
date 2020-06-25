@extends('layouts.user')

@section('head')
  <title>Packages</title>
  @parent
@endsection

@section('contents')
    <div data-stellar-background-ratio="0.5" class="sub-banner overlay pb-0">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="#">Packages</a></li>
        </ul>
        <h2 class="title font-100">Packages</h2>
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
                    @foreach ($domesticPackageDetails as $domesticPackageDetail)
                        <div class="col-md-4 col-sm-6">
                            <!-- Tours Thumb Start -->
                            <div class="thinn-tours-grid mb-30">
                                <figure>
                                    <img src="/contents/images/packages/domestic/{{$domesticPackageDetail->image}}" alt="" width="400" height="268"> 
                                    <div class="price-tag ps-top font-18">
                                        {{$domesticPackageDetail->price}}TK
                                    </div>
                                    <div class="rating_down ps-bottom">
                                        <div style="width: 80%;" class="rating_up"></div>
                                    </div>
                                </figure>
                                <div class="text">
                                    <h5 class="title font-16"><a href="tours-detail.html">{{$domesticPackageDetail->title}}</a></h5>
                                    <ul class="blog-meta tours-meta">
                                        <li>
                                            <i class="icon-clock-1"></i>
                                            <span>{{$domesticPackageDetail->days}}</span>
                                        </li>
                                        <li>
                                            <i class="icon-calendar3"></i>
                                            <span>Availability : {{$domesticPackageDetail->available_from}} - {{$domesticPackageDetail->available_to}}</span>
                                        </li>
                                        <li>
                                            <i class="icon-map4"></i>
                                            <span>{{$domesticPackageDetail->where}}</span>
                                        </li>
                                        <a class="btn btn-2" href="{{route('domesticPackageDetails', ['id' => $domesticPackageDetail->id])}}">View detail</a>
                                    </ul>
                                </div>
                            </div>
                            <!-- /Tours Thumb End -->
                        </div>
                    @endforeach
                    
                    <div class="col-md-12">
                        <!-- Pagination Start-->
                        <div class="thinn-pagination text-center">
                            {{ $domesticPackageDetails->links() }}
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
