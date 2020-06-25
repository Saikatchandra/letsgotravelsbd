@foreach ($items as $item)
    <div class="col-md-4 col-sm-6">
        <div class="tile">
            <div class="tile-title-w-btn">
                <h3 class="title">Actions</h3>
                <div class="btn-group">
                    <a class="btn btn-primary" href="{{route('newsAndUpdate.edit', ['id' =>$item->id])}}"><i class="fa fa-lg fa-edit"></i></a>
                    <a data-toggle="modal" data-target="#modalConfirmDelete" class="btn btn-danger" onclick="remove('{{$item->id}}')"><i class="fa fa-lg fa-trash"></i></a>
                </div>
            </div>

            <form id="removeForm{{$item->id}}" hidden>
                @csrf
                <input name="id" value="{{$item->id}}"/>
            </form>

            <div class="thumbnail hovereffect">
                <div class = "img-container">
                    <img src="/contents/images/newsAndUpdate/{{$item->image}}" class="img" alt="" style="height:300px; width:100%">
                </div>
            </div>

            <div class="tile-body">
                <br/>
                <h5 class="title font-16"><a href="{{route('tourDetails', ['id' =>$item->id])}}">{{$item->title}}</a></h5>
                <span>{{$item->description}}</span><br/>
            </div>
        </div>
    </div>
@endforeach