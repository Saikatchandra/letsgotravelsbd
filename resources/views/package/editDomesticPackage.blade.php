@extends('layouts.app')

@section('head')
  <title>Edit Package</title>
  @parent
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection

@section('package')
  is-expanded
@endsection

@section('domesticPackages')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Edit Domestic Package</h3>

            <form method="POST" action="/editDomesticPackagePost" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    {{-- <form class="form-horizontal"> --}}
                    <input name="id" value="{{$details->id}}" hidden/>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <input name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $details->title) }}" required type="text" placeholder="Enter title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Where</label>
                        <div class="col-md-8">
                            <input name="where" class="form-control @error('where') is-invalid @enderror" value="{{ old('where', $details->where) }}"  type="text" required placeholder="Enter tour destination">
                            @error('where')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Price</label>
                        <div class="col-md-8">
                            <input name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $details->price) }}" required type="number" placeholder="Enter price">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Days</label>
                        <div class="col-md-8">
                            <input name="days" class="form-control @error('days') is-invalid @enderror" value="{{ old('days', $details->days) }}" required type="number" placeholder="Enter days">
                            @error('days')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Available From</label>
                        <div class="col-md-8">
                            <input name="availableFrom" class="form-control @error('availableFrom') is-invalid @enderror" value="{{ old('availableFrom', $details->available_from) }}" type="date" placeholder="Enter available form date">
                            @error('availableFrom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Available To</label>
                        <div class="col-md-8">
                            <input name="availableTo" class="form-control @error('availableTo') is-invalid @enderror" value="{{ old('availableTo', $details->available_to) }}" type="date" placeholder="Enter available to date">
                            @error('availableTo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea rows="8" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description', $details->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-8">
                            <input name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="file" onchange="readURL(this)" accept="image/*"><br/>
                            <img id="previewImage" src="/contents/images/packages/domestic/{{$details->image}}" height="128" width="224"/>
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
    
                    {{-- <div class="form-group row">
                        <label class="control-label col-md-3">Address</label>
                        <div class="col-md-8">
                        <textarea class="form-control" rows="4" placeholder="Enter your address"></textarea>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row">
                        <label class="control-label col-md-3">Gender</label>
                        <div class="col-md-9">
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="gender">Female
                            </label>
                        </div>
                        </div>
                    </div> --}}
                    {{-- <div class="form-group row">
                        <label class="control-label col-md-3">Identity Proof</label>
                        <div class="col-md-8">
                        <input class="form-control" type="file">
                        </div>
                    </div> --}}
                    {{-- </form> --}}
                </div>
                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Edit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>

    <div id="loading" hidden>
        <div class='modal  fade in' style="display: block; position:absolute; min-height:500px">
          <img style="position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -50px;"
            alt="" src="/contents/images/others/loading.gif"
          />
        </div>
    </div>
    <div id="confirmationModal"></div>
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewImage')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection


