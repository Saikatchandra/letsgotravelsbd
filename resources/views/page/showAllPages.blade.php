
@extends('layouts.app')

@section('head')
  <title>Pages</title>
  @parent
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css"> --}}
@endsection

@section('managePages')
  is-expanded
@endsection

@section('showAllPages')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-th-list"></i> All Pages</h1>
            {{-- <p>Table to display analytical data effectively</p> --}}
          </div>
          <ul class="app-breadcrumb breadcrumb side">
            <a href="{{ route('createPage') }}"><button class="btn btn-primary">Create Slug</button></a>
          </ul>
        </div>
        <div id="slugsTable">
          <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <table class="table table-hover table-bordered" id="sampleTable">
                    <thead>
                      <tr>
                        <th>Action</th>
                        <th>Slug</th>
                        <th>Title</th>
                        {{-- <th>Description</th> --}}
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                          <tr>
                              
                              <td>
                                  <form id="removeSlugForm{{$item->id}}">
                                      <input hidden value="{{$item->id}}" name="id"/>
                                      <div class="btn-group">
                                          <a class="btn btn-primary" title="Edit" href="{{route('editPage', ['id' => $item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                          <a data-toggle="modal" title="Delete" data-target="#modalConfirmDelete" onclick="removeSlug({{$item->id}})" class="btn btn-danger" href="#"><i class="fa fa-lg fa-trash"></i></a>
                                      </div>
                                  </form>
                              </td>
                              
                              <td>{{$item->slug}}</td>
                              <td>{{$item->title}}</td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </main>

    {{-- <div id="loading" hidden>
        <div class='modal fade in' style="display: block; position:absolute; min-height:500px">
          <img style="position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -50px;
            margin-left: -50px;"
            alt="" src="/contents/images/others/loading.gif"
          />
        </div>
    </div> --}}

    <div hidden class="modal fade show" id="loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style="padding-right: 17px; display: block;">
      <div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
          <img alt="" src="/contents/images/others/loading.gif"/>
      </div>
    </div>
    <div id="confirmationModal"></div>

    @parent
@endsection

@section('foot')
    @parent
    <script type="text/javascript" src="/contents/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/contents/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
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
        });
    </script>

    <script>
      function removeSlug(id)
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
          var form = $('#removeSlugForm'+id);
          // console.log(form);
          $.ajax({
              type: "POST",
              url : "/deletePage",
              data : form.serialize(),
              success : function(data){
                  $('#slugsTable').html(data);
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
@endsection