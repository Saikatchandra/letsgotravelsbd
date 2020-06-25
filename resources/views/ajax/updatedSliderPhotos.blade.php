<div class="row">
    <div class="col-md-12">
        <div class="tile">
        <div class="tile-body">
            <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
                <tr>
                <th>Action</th>
                <th>Title</th>
                <th>Image</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($slider as $item)
                    <tr>
                        
                        <td>
                            <form id="removePhotoForm{{$item->id}}">
                                @csrf
                                <input hidden value="{{$item->id}}" name="id"/>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalConfirmDelete" onclick="removePhoto({{$item->id}})"><i class="fa fa-remove" style="cursor:pointer">Remove</i></button>
                                <a href="{{route('editSlider',['id'=> $item->id])}}"><button type="button" class="btn btn-primary" ><i class="fa fa-edit" style="cursor:pointer">Edit</i></button></a>
                            </form>
                        </td>
                        
                        <td>{{$item->title}}</td>
                        <td><a href="/contents/images/slider/{{$item->image}}" target="_blank"><img src="/contents/images/slider/{{$item->image}}" height="56px"/></a></td>
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