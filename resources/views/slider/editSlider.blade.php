@extends('layouts.app')

@section('head')
  <title>Slider</title>
  @parent
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
    .img-top-left {
        position: absolute;
        /* opacity: .5; */
        /* background-color: #3c8dbc; */
        color: Red;
        /* height: 20px;
        width: 40px; */
        top: -10px;
        left: 10px;
        cursor: pointer;
    }
  </style>
@endsection

@section('siteConfiguration')
  is-expanded
@endsection

@section('slider')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Edit Slider</h3>

            <form method="POST" action="/editSliderPost" enctype="multipart/form-data" id="addPhotos">
                @csrf
                <div class="tile-body">
                    {{-- <form class="form-horizontal"> --}}
                    <input name="id" value="{{$item->id}}" hidden/>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Title 1</label>
                        <div class="col-md-8">
                            <input name="title1" multiple class="form-control @error('title1') is-invalid @enderror" value="{{ old('title1', $item->title1) }}" required type="text">
                            @error('title1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Title 2</label>
                        <div class="col-md-8">
                            <input name="title2" multiple class="form-control @error('title2') is-invalid @enderror" value="{{ old('title2', $item->title2) }}" required type="text">
                            @error('title2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-8">
                            <input name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" type="file" onchange="readURL(this)" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br/>
                            <img id="previewImage" src="{{ asset($item->image) }}" height="128" width="224"/>
                        </div>
                    </div>
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
    @parent
@endsection

@section('foot')
    @parent
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


