@foreach ($domesticPackageDetails as $item)
    <div class="col-md-4 col-sm-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title"></h3>
                <div class="btn-group">
                    <a class="btn btn-primary" href="{{route('editDomesticPackage', ['id' =>$item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                    <a data-toggle="modal" data-target="#modalConfirmDelete" class="btn btn-danger" onclick="removePackage('{{$item->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                </div>
            </div>

            <form id="removePackageForm{{$item->id}}" action="/deleteDomesticPackage" method="post" hidden>
                @csrf
                <input name="id" value="{{$item->id}}"/>
            </form>

            <div class="thumbnail hovereffect">
                <div class = "img-container">
                    <img src="/contents/images/packages/domestic/{{$item->image}}" class="img" alt="" style="height:300px; width:100%">
                </div>
            </div>

            <div class="tile-body">
                <h5 class="title font-16"><a href="tours-detail.html">{{$item->title}}</a></h5>
                <span>{{$item->days}} days</span><br/>
                <span>Availability : {{$item->available_from}} - {{$item->available_to}}</span><br/>
                <span>{{$item->where}}</span>
            </div>
        </div>
    </div>
@endforeach