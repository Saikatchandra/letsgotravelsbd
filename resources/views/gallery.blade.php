@extends('layouts.user')

@section('head')
  <title>Welcome</title>
  @parent
@endsection

@section('contents')

    <div data-stellar-background-ratio="0.5" class="sub-banner overlay pb-0">
        <ul>
            <li><a href="{{route('welcome')}}">Home</a></li>
            <li><a href="#">Our Gallery</a></li>
        </ul>
        <h2 class="title font-100">Our Gallery</h2>
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
                    @foreach ($photoGallery as $item)
                        <div class="col-md-4 col-sm-6">
                            <!-- Tours Thumb Start -->
                            <div class="thumbnail hovereffect">
                                <div class = "img-container">
                                    <img src="contents/images/photoGallery/{{$item->image}}" class="img" alt="" style="height:280px; width:100%"> 
                                    {{-- <div class="price-tag ps-top font-18">
                                        {{$tourDetail->price}}TK
                                    </div> --}}
                                    {{-- <div class="rating_down ps-bottom">
                                        <div style="width: 80%;" class="rating_up"></div>
                                    </div> --}}
                                </div>
                            </div>
                            <!-- /Tours Thumb End -->
                        </div>
                    @endforeach
                    
                </div>
            </div><!-- / Container -->
        </div><!-- /Blog Grid Section -->
    </div><!-- /Main Contant End -->
    @parent
@endsection

@section('foot')
@parent
@endsection