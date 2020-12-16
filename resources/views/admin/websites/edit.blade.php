@extends('layouts.dashboard.app')

@section('content')
    <h2>Websites</h2>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.websites.index')}}">Websites</a></li>
            <li class="breadcrumb-item active">Update</li>
        </ol>
    </nav>
    <div class="tile mb-4">
        <form method="POST" action="{{ route('admin.websites.update', [$website->id])}}" enctype="multipart/form-data">
            @csrf
            @include('dashboard.partials._errors')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $website->name )}}">
            </div>
            <div class="form-group">
                <label>Url</label>
                <input type="text" name="url" class="form-control" value="{{ old('url', $website->url )}}">
            </div>
            <div class="form-group">
                <label>Content</label>
                <input type="hidden" name="content" id="content" cols="30" rows="10"></input>
                <input id="short_desc" type="hidden" name="content" value="{{ $website->content }}">
                <trix-editor input="short_desc" placeholder="Product short description"></trix-editor>
            </div>
            <div class="form-group">
                <a class="addphoto" style="width: 50%;" >
                    <!-- <i class="fas fa-plus fa-9x"></i> -->
                        <input id="" type="file" class="form-control foo {{ $errors->has('image') ? ' is-invalid' : '' }}" 
                        value="{{ old('image') }}" name="image" onchange="readURL(this);" >
                        @if ($errors->has('image'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif
                        <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#blah')
                                        .attr('src', e.target.result)
                                        .width(250)
                                        .height(250)
                                        .css('object-fit', 'cover');
                                };

                                reader.readAsDataURL(input.files[0]);
                            }
                        }
                    </script>                            
                </a>

            </div>
            <img id="blah" src="{{ asset('uploads/websites') }}/{{ $website->image }}" alt="your image" />
            <br><br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Update</button>
            </div>
        </form>
    </div> <!-- end of tile -->
@endsection