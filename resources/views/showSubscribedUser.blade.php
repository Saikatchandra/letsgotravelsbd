
@extends('layouts.app')

@section('head')
  <title>Contact List</title>
  @parent
@endsection

@section('subscription')
  is-expanded
@endsection

@section('subscribedUser')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="app-title">
          <div>
            <h1><i class="fa fa-th-list"></i> Contact List</h1>
            {{-- <p>Table to display analytical data effectively</p> --}}
          </div>
          {{-- <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tables</li>
            <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
          </ul> --}}
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="tile">
              <div class="tile-body">
                <table class="table table-hover table-bordered" id="sampleTable">
                  <thead>
                    <tr>
                      <th>Action</th>
                      <th>Id</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($items as $item)
                        <tr>
                            
                            <td>
                                <form id="deleteSubscriptionForm{{$item->id}}" action='/deleteSubscription' method="post">
                                    @csrf
                                    <input hidden value="{{$item->id}}" name="id"/>
                                    <i data-toggle="modal" data-target="#modalConfirmDelete" onclick="deleteSubscription({{$item->id}})" class="fa fa-remove" style="color:red;cursor:pointer">Remove</i>
                                </form>
                            </td>
                            
                            <td>{{$item->id}}</td>
                            <td>{{$item->email}}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </main>
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
        function deleteSubscription(id)
        {
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
                    '<a onclick="confirmRemove('+id+')" class="btn  btn-outline-danger">Yes</a>'+
                    '<a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>'+
                    '</div>'+
                '</div>'+
                '</div>'+
            '</div>';
        }

        function confirmRemove(id)
        {
            // alert(id);
            $("#deleteSubscriptionForm"+id).submit();
        }
    </script>
@endsection