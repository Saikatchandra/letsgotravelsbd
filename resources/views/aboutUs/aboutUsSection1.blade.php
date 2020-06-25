@extends('layouts.app')

@section('head')
  <title>Company Configuration</title>
  @parent
@endsection

@section('aboutUs')
  is-expanded
@endsection

@section('aboutUsSection1')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">About-Us section 1</h3>
            <form method="POST" action="aboutUsSection1Post" enctype="multipart/form-data">
                @csrf
                <input name="id" value="{{$item->id??null}}" hidden/>
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <input name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item->title??null) }}" type="text" maxlength="20" placeholder="Enter title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">About-Us</label>
                        <div class="col-md-8">
                            <textarea rows="8" name="aboutUs" class="form-control @error('aboutUs') is-invalid @enderror" placeholder="Enter About-Us">{{ old('aboutUs', $item->about_us??null) }}</textarea>
                            @error('aboutUs')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Images</label>
                        <div class="col-md-8">
                            <input name="image[]" multiple class="form-control @error('image.*') is-invalid @enderror" value="{{ old('image[]') }}" type="file" onchange="readURL(this)" accept="image/*"><br/>
                            
                            <div id="previewImage">
                                @foreach (explode('|', $item->images??null) as $image)
                                {{-- src="/contents/images/companyLogo/{{$informations->logo}}" --}}
                                    <img src="{{ asset('contents/images/aboutUs/aboutUsSection1/'.$image) }}" height="128" width="224"/>
                                @endforeach
                            </div>

                            @error('image.*')
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
        function readURL(input){

            var fileList = input.files;
            if(fileList && fileList[0])
            {
                $('#previewImage').html('');
            }
            var anyWindow = window.URL || window.webkitURL;
            for(var i = 0; i < fileList.length; i++){
                //get a blob to play with
                var objectUrl = anyWindow.createObjectURL(fileList[i]);
                // for the next line to work, you need something class="preview-area" in your html
                $('#previewImage').append('<img src="' + objectUrl + '"height="128px" width="224px"/>&nbsp;&nbsp;');
                // get rid of the blob
                window.URL.revokeObjectURL(fileList[i]);
            }
        }
    </script>
@endsection