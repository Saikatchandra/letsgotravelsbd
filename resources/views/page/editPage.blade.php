@extends('layouts.app')

@section('head')
  <title>Edit Slug</title>
  @parent
@endsection

@section('slider')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Edit Slug</h3>

            <form method="POST" action="/editPagePost" enctype="multipart/form-data">
                @csrf
                <div class="tile-body">
                    {{-- <form class="form-horizontal"> --}}
                    <input value="{{$item->id}}" name="id" hidden/>
                    <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <div class="input-group">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-primary">www.web.com/</button>
                                </div>
                                <!-- /btn-group -->
                                <input name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $item->slug) }}"  type="text" required placeholder="Enter Slug">
                            </div>
                            @error('slug')
                                <span style="color:red" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <input name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title', $item->title) }}" required type="text" maxlength="30" placeholder="Enter title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea rows="10" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description', $item->description) }}</textarea>
                            @error('description')
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

@endsection