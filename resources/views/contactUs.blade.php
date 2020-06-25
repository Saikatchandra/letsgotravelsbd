@extends('layouts.user')

@section('head')
  <title>Contact-Us</title>
  @parent
@endsection

@section('contents')
	
    <div class="main-contant">
        
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="contact-form">
                            <h4 class="section-title font-26 mb-22">Contact Form</h4>
                            <form id="contact-form" action="/contactPost" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="text" value="" data-msg-required="Please enter your name" maxlength="100" class="form-control " name="name" id="name" placeholder="Name *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <input type="email" value="" data-msg-required="Please enter your email address" data-msg-email="Please enter a valid email address" maxlength="100" class="form-control " name="email" id="email" placeholder="E-mail *" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea maxlength="5000" data-msg-required="Please enter your message" rows="4" class="form-control " name="message" id="message" placeholder="Your Message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input class="btn" type="submit" value="submit" data-loading-text="Loading...">
                                    </div>
                                    <!--Input Field End-->
                                    <div class="alert alert-success hidden animated pulse" id="contactSuccess">
                                        Thanks, your message has been sent to us.
                                    </div>
                                    <div class="alert alert-danger hidden animated shake" id="contactError">
                                        <strong>Error!</strong> There was an error sending your message.
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <aside class="contact-sidebar">
                            <div class="widget widget-address">
                                <h4 class="widget-title">Address</h4>
                                <p>{{$companyConfiguration->address}}</p>
                            </div>
                            <div class="widget widget-phone">
                                <h4 class="widget-title">Phone</h4>
                                <p>{{$companyConfiguration->phone_number1}}</p>
                                <p>{{$companyConfiguration->phone_number2}}</p>
                            </div>
                            <div class="widget widget-email">
                                <h4 class="widget-title">Email</h4>
                                <p>{{$companyConfiguration->email}}</p>
                            </div>
                        </aside>
                    </div>
                </div>
                
            </div><!-- / Container -->
        </div><!-- /Blog Grid Section -->
        <div class="contact-map">
            <div data-address="{{$companyConfiguration->google_map}}}" class="map-canvas"></div>
        </div> 
        
    </div><!-- /Main Contant End -->
    @parent
@endsection

@section('foot')
    @parent
    <script>
        if({{Session::has('successMessage')}})
        {
            alert("{{Session::get('successMessage')}}")
        }
    </script>
@endsection