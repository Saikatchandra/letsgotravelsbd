@foreach ($umrahDetails as $item)
    <div class="col-md-4 col-sm-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title"></h3>
                <div class="btn-group">
                    <a class="btn btn-primary" href="{{route('editUmrah', ['id' =>$item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                    <a data-toggle="modal" data-target="#modalConfirmDelete" class="btn btn-danger" onclick="removeUmrah('{{$item->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                </div>
            </div>

            <form id="removeUmrahForm{{$item->id}}" action="/deleteUmrah" method="post" hidden>
                @csrf
                <input name="id" value="{{$item->id}}"/>
            </form>

            <div class="thumbnail hovereffect">
                <div class = "img-container">
                    <img src="/contents/images/hajj&umrah/umrah/{{$item->image}}" class="img" alt="" style="height:300px; width:100%">
                </div>
            </div>

            <div class="tile-body">
                <h5 class="title font-16"><a href="tours-detail.html">{{$item->title}}</a></h5>
                <span>{{$item->desc}} </span><br/>
                
            </div>
        </div>
    </div>
@endforeach