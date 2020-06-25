@extends('layouts.app')

@section('head')
  <title>Tours</title>
  @parent
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection

@section('manageTour')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Manage Tours</h3>

            <ul class="nav nav-pills">
              <li style="cursor: pointer; background-color:white;border:1px solid rgba(0,0,100,.3)" class="@if($errors->isEmpty()) active @endif" id="viewAllTab"><a data-toggle="tab">&nbsp;&nbsp;&nbsp;View All &nbsp;&nbsp;&nbsp;</a></li>
              <li style="cursor: pointer; background-color:white;border:1px solid rgba(0,0,100,.3)" class="@if(!$errors->isEmpty()) active @endif" id="addTourTab"><a data-toggle="tab">&nbsp;&nbsp;&nbsp;Add Tour&nbsp;&nbsp;&nbsp;</a></li>
            </ul>
            <br/>
            <br/>

            
            <div class="section" id="viewAll" @if (!$errors->isEmpty()) style="display:none" @endif>
                <div class="container">
                     @foreach ($items as $item)
                    <div class="row" id="viewAllArea">
                     
                          <div class="col-md-4 col-sm-6">
                                <div class="tile">
                                    <div class="tile-title-w-btn">
                                        <h3 class="title">Actions</h3>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{route('editTour', ['id' =>$item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                            <a data-toggle="modal" data-target="#modalConfirmDelete" class="btn btn-danger" onclick="removeTour('{{$item->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                                        </div>
                                    </div>

                                    <form id="removeTourForm{{$item->id}}" action="/deleteTour" method="post" hidden>
                                        @csrf
                                        <input name="id" value="{{$item->id}}"/>
                                    </form>

                                    <div class="thumbnail hovereffect">
                                        <div class = "img-container">
                                            <img src="/contents/images/tour/{{$item->image}}" class="img" alt="" style="height:300px; width:100%">
                                        </div>
                                    </div>

                                    <div class="tile-body">
                                        <h5 class="title font-16"><a href="{{route('tourDetails', ['id' =>$item->id])}}">{{$item->title}}</a></h5>
                                        <span>{{$item->days}} days</span><br/>
                                        <span>Availability : {{$item->available_from}} - {{$item->available_to}}</span><br/>
                                        <span>{{$item->where}}</span>
                                    </div>
                                </div>
                          </div>
              
                    </div>
                            @endforeach
                </div><!-- / Container -->
            </div><!-- /Blog Grid Section -->

            <form method="POST" action="/addTourPost" enctype="multipart/form-data" id="addTour" @if ($errors->isEmpty()) style="visibility: hidden;" @endif>
                @csrf
                <div class="tile-body">
                    {{-- <form class="form-horizontal"> --}}
                    <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <input name="title" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required type="text" placeholder="Enter title">
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
                            <input name="where" class="form-control @error('where') is-invalid @enderror" value="{{ old('where') }}" required type="text" placeholder="Enter tour destination">
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
                            <input name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" required type="number" placeholder="Enter price">
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
                            <input name="days" class="form-control @error('days') is-invalid @enderror" value="{{ old('days') }}" required type="number" placeholder="Enter days">
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
                            <input name="availableFrom" class="form-control @error('availableFrom') is-invalid @enderror" value="{{ old('availableFrom') }}" required type="text" id="date" placeholder="Enter available form date">
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
                            <input name="availableTo" class="form-control @error('availableTo') is-invalid @enderror" value="{{ old('availableTo') }}" required type="text" id="date1" placeholder="Enter available to date">
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
                            <textarea name="description" rows="10" class="form-control @error('description') is-invalid @enderror" placeholder="Enter description">{{ old('description') }}</textarea>
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
                            <input name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required type="file" onchange="readURL(this)" accept="image/*">
                            @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br/>
                            <img id="previewImage" height="128" width="224" hidden/>
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
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $("#viewAllTab").click(function(e){
                // $("#addTour").attr('hidden', 'true');
				// $("#viewAll").removeAttr('hidden');

				$("#viewAll").show();
				$("#addTour").hide();
            });

            $("#addTourTab").click(function(e){
                // $("#viewAll").attr('hidden', 'true');
				// $("#addTour").removeAttr('hidden');

				// $("#addTour").show();
				// $("#viewAll").hide();
                
                $("#addTour").removeAttr('style');
				$("#viewAll").hide();
            });
        })
    </script>

    <script>
        function removeTour(id)
        {
            // alert(id);
            document.getElementById("confirmationModal").innerHTML = ''+
            
            '<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">'+
                '<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">'+
                
                '<div class="modal-content text-center">'+
                    
                    '<div class="modal-header d-flex justify-content-center">'+
                    '<p class="heading">Are you sure?</p>'+
                    '</div>'+
            
                
                    '<div class="modal-body">'+
            
                    '<i class="fa fa-times fa-4x animated rotateIn" style="color:red"></i>'+
            
                    '</div>'+
            
                
                    '<div class="modal-footer flex-center">'+
                    '<a onclick="confirmRemove('+id+')" class="btn  btn-outline-danger" data-dismiss="modal">Yes</a>'+
                    '<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>'+
                    '</div>'+
                '</div>'+
                '</div>'+
            '</div>';
        }

        function confirmRemove(id)
        {          
            // alert(id);
            var form = $('#removeTourForm'+id);
            console.log(form);
            $.ajax({
                type: "POST",
                url : "/deleteTour",
                data : form.serialize(),
                success : function(data){
                    console.log(data);
                    $('#viewAllArea').html(data);
                    // document.getElementById("confirmationModal").innerHTML = '';
                }
            });
        }
    </script>

    <script>
        $(document).ajaxStart(function() {
        // alert('Ajax start');
        $('#loading').removeAttr('hidden'); // show the gif image when ajax starts
            }).ajaxStop(function() {
                $('#loading').attr('hidden', 'true'); // hide the gif image when ajax completes
            });
    </script>

    <script>
        if({{Session::has('successMessage')}})
        {
            alert('{{Session::get("successMessage")}}');
        }
    </script>

    
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="/contents/js/plugins/bootstrap-datepicker.min.js"></script>

    <script>
        $('#date').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true
    });
    $('#date1').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true
    });
    </script>

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
                        .attr('src', e.target.result)
                        .removeAttr('hidden');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection


