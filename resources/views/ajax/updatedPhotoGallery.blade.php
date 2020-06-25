@foreach ($photoGallery as $item)
    <div class="col-md-4 col-sm-6">
        <!-- Tours Thumb Start -->
        <div class="thumbnail hovereffect">
        <div class = "img-container">
            <img src="contents/images/photoGallery/{{$item->image}}" class="img" alt="" style="height:300px; width:100%"> 
            <form id="removePhotoForm{{$item->id}}">
                {{-- @csrf --}}
                <input name="id" value="{{$item->id}}" hidden>
            </form>
            <i data-toggle="modal" data-target="#modalConfirmDelete" onclick="removePhoto({{$item->id}})" title="Remove" class="img-top-left fa fa-remove fa-2x"></i>
        </div>
        </div>
        <!-- /Tours Thumb End -->
    </div>
@endforeach