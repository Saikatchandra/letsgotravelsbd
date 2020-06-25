@extends('layouts.app')

@section('head')
  <title>Package</title>
  @parent
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection

@section('hajj&umrah')
  is-expanded
@endsection

@section('hajj')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Manage Hajj</h3>

            <ul class="nav nav-pills">
              <li style="cursor: pointer; background-color:white;border:1px solid rgba(0,0,100,.3)" class="@if($errors->isEmpty()) active @endif" id="viewAllTab"><a data-toggle="tab">&nbsp;&nbsp;&nbsp;View All &nbsp;&nbsp;&nbsp;</a></li>
              <li style="cursor: pointer; background-color:white;border:1px solid rgba(0,0,100,.3)" class="@if(!$errors->isEmpty()) active @endif" id="addPackageTab"><a data-toggle="tab">&nbsp;&nbsp;&nbsp;Add Hajj&nbsp;&nbsp;&nbsp;</a></li>
            </ul>
            <br/>
            <br/>

            <div class="section" id="viewAll" @if (!$errors->isEmpty()) hidden @endif>
                <div class="container">
                      @foreach ($hajjDetails as $item)
                    <div class="row" id="viewAllArea">
                     <div class="col-md-4 col-sm-6">
                                <div class="tile">
                                    <div class="tile-title-w-btn">
                                        <h3 class="title"></h3>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{route('editHajj', ['id' =>$item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                            <a data-toggle="modal" data-target="#modalConfirmDelete" onclick="removeHajj({{$item->id}})" class="btn btn-danger"><i class="fa fa-lg fa-trash"></i></a>

           {{--  <form id="delete-form-{{ $item->id }}" method="POST" action="{{ url('/deleteHajj',$item->id) }}" style="display: none;">
         {{ csrf_field() }}
         {{ method_field('DELETE') }}
        </form>
        <a  data-toggle="modal" data-target="#modalConfirmDelete" class="btn btn-danger"
        onclick="if(confirm('Are you sure to delete')){
            event.preventDefault();
            document.getElementById('delete-form-{{ $item->id }}').submit();       
        }else {
            event.preventDefault();
        }"><i class="fa fa-lg fa-trash"></i></a> --}}                               
                                        </div>
                                    </div>

                                    <form id="removeHajjForm{{$item->id}}" action="/deleteHajj" method="post" hidden>
                                        @csrf
                                        <input name="id" value="{{$item->id}}"/>
                                    </form>

                                    <div class="thumbnail hovereffect">
                                        <div class = "img-container">
                                            <img src="/contents/images/hajj&umrah/hajj/{{$item->image}}" class="img" alt="" style="height:300px; width:100%">
                                        </div>
                                    </div>

                                    <div class="tile-body">
                                        <h5 class="title font-16"><a href="tours-detail.html">{{$item->title}}</a></h5>
                                        <span>{{strip_tags($item->desc)}} </span><br/>
                                       
                                    </div>
                                </div>
                          </div>
                     
                    </div>
                     @endforeach
                </div><!-- / Container -->
            </div><!-- /Blog Grid Section -->

            <form method="POST" action="/addHajj" enctype="multipart/form-data" id="addPackage"  @if ($errors->isEmpty()) style="visibility:hidden" @endif>
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

                      {{-- <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <input name="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}" type="text" maxlength="190" placeholder="Enter description">
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Enter About-Us">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label class="control-label col-md-3">Description</label>
                        <div class="col-md-8">
                            <textarea rows="8" name="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="Enter desc">{{ old('desc') }}</textarea>
                            @error('desc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3">Image</label>
                        <div class="col-md-8">
                            <input name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" required type="file" onchange="readURL(this)" accept="image/*"><br/>
                            <img id="previewImage" hidden height="128" width="224"/>
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
                // $("#addPackage").attr('hidden', 'true');
				// $("#viewAll").removeAttr('hidden');

				$("#viewAll").show();
				$("#addPackage").hide();
            });

            $("#addPackageTab").click(function(e){
                // $("#viewAll").attr('hidden', 'true');
				// $("#addPackage").removeAttr('hidden');

				$("#addPackage").removeAttr('style');
				$("#viewAll").hide();
            });
        })
    </script>

    <script>
        function removeHajj(id)
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
            var form = $('#removeHajjForm'+id);
            console.log(form);
            $.ajax({
                type: "POST",
                url : "/deleteHajj",
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


