@extends('layouts.app')

@section('head')
  <title>Blog</title>
  @parent
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
@endsection

@section('manageBlog')
  is-expanded
@endsection

@section('showAllPost')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            {{-- <h3 class="tile-title">Manage Blog</h3> --}}
            <h3>Manage Blog</h3>

            <div class="section">
                <div class="container">
                     @foreach ($items as $item)
                    <div class="row" id="viewAllArea">
                     
                          <div class="col-md-4 col-sm-6">
                                <div class="tile">
                                    <div class="tile-title-w-btn">
                                        <h3 class="title">Actions</h3>
                                        <div class="btn-group">
                                            <a class="btn btn-primary" href="{{route('editPost', ['id' =>$item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                            <a data-toggle="modal" data-target="#modalConfirmDelete" class="btn btn-danger" onclick="remove('{{$item->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                                        </div>
                                    </div>

                                    <form id="removeForm{{$item->id}}" hidden>
                                        @csrf
                                        <input name="id" value="{{$item->id}}"/>
                                    </form>

                                    <div class="thumbnail hovereffect">
                                        <div class = "img-container">
                                            <img src="/contents/images/blog/{{$item->image}}" class="img" alt="" style="height:300px; width:100%">
                                        </div>
                                    </div>

                                    <div class="tile-body">
                                        <br/>
                                        <h5 class="title font-16"><a href="{{route('tourDetails', ['id' =>$item->id])}}">{{$item->title}}</a></h5>
                                        <span>{!! str_limit(strip_tags($item->description),80) !!}</span><br/>
                                    </div>
                                </div>
                          </div>
                     
                    </div>
                     @endforeach
                </div><!-- / Container -->
            </div><!-- /Blog Grid Section -->

        </div>

        {{-- <div id="loading" hidden>
            <div class='modal  fade in' style="display: block; position:absolute; min-height:500px">
                <img style="position: absolute;
                top: 50%;
                left: 50%;
                margin-top: -50px;
                margin-left: -50px;"
                alt="" src="/contents/images/others/loading.gif"
                />
            </div>
        </div> --}}
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
        })
    </script>

    <script>
        function remove(id)
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
            var form = $('#removeForm'+id);
            console.log(form);
            $.ajax({
                type: "POST",
                url : "/deletePost",
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

@endsection


