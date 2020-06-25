@extends('layouts.app')

@section('head')
  <title>Company Configuration</title>
  @parent
@endsection

@section('companyConfiguration')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Company Configuration</h3>
            <form method="POST" action="companyConfigurationPost" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Name</label>
                        <div class="col-md-8">
                            <input name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $informations->company_name??null) }}" type="text" maxlength="190" placeholder="Enter company name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Logo</label>
                        <div class="col-md-8">
                            <input name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo', $informations->logo??null) }}" type="file" onchange="readURL(this)" accept="image/*">
                            <img id="previewLogo" src="/contents/images/companyLogo/{{$informations->logo??null}}" height="60" width="215"/>
                            
                            @error('logo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Address</label>
                        <div class="col-md-8">
                            <input name="address" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', $informations->address??null) }}" type="text" placeholder="Enter company address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Phone Number 1</label>
                        <div class="col-md-8">
                            <input name="phoneNumber1" class="form-control @error('phoneNumber1') is-invalid @enderror" name="phoneNumber1" value="{{ old('phoneNumber1', $informations->phone_number1??null) }}" type="text" placeholder="Enter company Phone Number">
                            @error('phoneNumber1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Phone Number 2</label>
                        <div class="col-md-8">
                            <input name="phoneNumber2" class="form-control @error('phoneNumber2') is-invalid @enderror" name="phoneNumber2" value="{{ old('phoneNumber2', $informations->phone_number2??null) }}" type="text" placeholder="Enter company Phone Number">
                            @error('phoneNumber2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Email</label>
                        <div class="col-md-8">
                            <input name="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email',$informations->email??null) }}" type="email" placeholder="Enter company email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Facebook Link</label>
                        <div class="col-md-8">
                            <input name="facebook" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook',$informations->facebook??null) }}" type="text" placeholder="Enter company facebook link">
                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Company Google Map</label>
                        <div class="col-md-8">
                            <input name="googleMap" class="form-control @error('googleMap') is-invalid @enderror" name="googleMap" value="{{ old('googleMap', $informations->google_map??null) }}" type="text" placeholder="Enter company google map">
                            @error('googleMap')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Short About-Us</label>
                        <div class="col-md-8">
                            <input name="shortAboutUs" class="form-control @error('shortAboutUs') is-invalid @enderror" value="{{ old('shortAboutUs', $informations->short_about_us??null) }}" type="text" maxlength="120" placeholder="Enter Short About-Us">
                            @error('shortAboutUs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Descriptive About-Us</label>
                        <div class="col-md-8">
                            <textarea rows="8" name="aboutUs" class="form-control @error('aboutUs') is-invalid @enderror" placeholder="Enter About-Us">{{ old('aboutUs', $informations->about_us??null) }}</textarea>
                            @error('aboutUs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    @parent
@endsection

@section('foot')
    @parent					
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
    
    <script>
        if({{Session::has('successMessage')}})
        {
            alert("{{Session::get('successMessage')}}")
        }
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewLogo')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection