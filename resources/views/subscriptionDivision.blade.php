@extends('layouts.app')

@section('head')
  <title>Subscription Division</title>
  @parent
@endsection

@section('subscription')
  is-expanded
@endsection

@section('subscriptionDivision')
  active
@endsection

@section('contents')
    <main class="app-content">
        <div class="tile">
            <h3 class="tile-title">Subscription Division</h3>
            <form method="POST" action="/subscriptionDivisionPost" enctype="multipart/form-data">
                @csrf
                <input name="id" value="{{$item->id}}" hidden/>
                <div class="tile-body">
                    <div class="form-group row">
                        <label class="control-label col-md-3">Text (With in 150 character)</label>
                        <div class="col-md-8">
                            <input name="text" class="form-control @error('text') is-invalid @enderror" value="{{ old('text', $item->text) }}" type="text" maxlength="150" placeholder="Enter subscription division text with in 150 character">
                            @error('text')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="tile-footer">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-3">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
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
        if({{Session::has('successMessage')}})
        {
            alert("{{Session::get('successMessage')}}")
        }
    </script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#previewImage')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection