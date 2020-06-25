@extends('layouts.app')

@section('head')
  <title>Manage Gallery</title>
  @parent
  <meta name="csrf-token" content="{{ csrf_token() }}">  
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
@section('photoGallery')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Manage Photo Gallery</h3>

            <ul class="nav nav-pills">
              <li style="cursor: pointer; background-color:white;border:1px solid rgba(0,0,100,.3)" class="active" id="viewPhotosTab"><a data-toggle="tab">&nbsp;&nbsp;&nbsp;View Photos &nbsp;&nbsp;&nbsp;</a></li>
              <li style="cursor: pointer; background-color:white;border:1px solid rgba(0,0,100,.3)" id="addPhotosTab"><a data-toggle="tab">&nbsp;&nbsp;&nbsp;Add Photos&nbsp;&nbsp;&nbsp;</a></li>
            </ul>
            <br/>
            <br/>

            
            <div class="section" id="viewPhotos">
                <div class="container">
                     @foreach ($photoGallery as $item)
                    <div class="row" id="photoArea">
                     
                          <div class="col-md-4 col-sm-6">
                              <!-- Tours Thumb Start -->
                              <div class="thumbnail hovereffect">
                                <div class = "img-container">
                                    <img src="contents/images/photoGallery/{{$item->image}}" class="img" alt="" style="height:250px; width:100%"> 
                                    <form id="removePhotoForm{{$item->id}}">
                                        {{-- @csrf --}}
                                        <input name="id" value="{{$item->id}}" hidden>
                                    </form>
                                    <i data-toggle="modal" data-target="#modalConfirmDelete" onclick="removePhoto({{$item->id}})" title="Remove" class="img-top-left fa fa-remove fa-2x"></i>
                                </div>
                              </div>
                              <!-- /Tours Thumb End -->
                          </div>
                     
                    </div>
                     @endforeach
                </div><!-- / Container -->
            </div><!-- /Blog Grid Section -->

            <form method="POST" action="/addPhotosToGallery" enctype="multipart/form-data" id="addPhotos" hidden>
                @csrf
                <div class="tile-body">
                    {{-- <form class="form-horizontal"> --}}

                    {{-- <div class="form-group row">
                        <label class="control-label col-md-3">Title</label>
                        <div class="col-md-8">
                            <input name="title" multiple class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required type="text">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div> --}}

                    <div class="form-group row">
                        <label class="control-label col-md-3">Images</label>
                        <div class="col-md-8">
                            <input name="image[]" multiple class="form-control @error('image.*') is-invalid @enderror" value="{{ old('image[]') }}" required type="file" onchange="readURL(this)" accept="image/*"><br/>
                            <div id="previewImage"></div>
                            @error('image.*')
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
            
            $("#viewPhotosTab").click(function(e){
                $("#addPhotos").attr('hidden', 'true');
				$("#viewPhotos").removeAttr('hidden');

				// $("#detailsViewHouseCountDiv").show();
				// $("#totalHouseCountInMapDiv").hide();
            });

            $("#addPhotosTab").click(function(e){
                $("#viewPhotos").attr('hidden', 'true');
				$("#addPhotos").removeAttr('hidden');

				// $("#detailsViewHouseCountDiv").show();
				// $("#totalHouseCountInMapDiv").hide();
            });
        })
    </script>

    <script>
        function removePhoto(id)
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
            var form = $('#removePhotoForm'+id);
            console.log(form);
            $.ajax({
                type: "POST",
                url : "/removePhotoFromPhotoGallery",
                data : form.serialize(),
                success : function(data){
                    console.log(data);
                    $('#photoArea').html(data);
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


