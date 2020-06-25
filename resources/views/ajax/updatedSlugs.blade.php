
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
                        <form id="removeContactForm{{$item->id}}" action='/removeContact' method="post">
                            @csrf
                            <input hidden value="{{$item->id}}" name="id"/>
                            <div class="btn-group">
                                <a class="btn btn-primary" title="Edit" href="{{route('editPage', ['id' => $item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                                <a data-toggle="modal" title="Delete" data-target="#modalConfirmDelete" onclick="removePackage(1)" class="btn btn-danger" href="#"><i class="fa fa-lg fa-trash"></i></a>
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

<script type="text/javascript" src="/contents/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/contents/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>