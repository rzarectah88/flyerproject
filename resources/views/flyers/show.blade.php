@extends('layout')

@section('content')
    <div class="row">
        <div class="col-md-3">
            <h1>{!! $flyer->street !!}</h1>
            <h1>{!! $flyer->price !!}</h1>
            <hr>
            <div class="description">{!! nl2br($flyer->description) !!} </div>

        </div>
        <div class="col-md-9">
            @foreach($flyer->photos as $photo)
                <img src="{{ $photo->path }}" alt="">
            @endforeach
        </div>
        <hr>
        <h2>Add photos</h2>
        <form id="addPhotosForm" action="/{{ $flyer->zip }}/{{ $flyer->street }}/photos" method="post" class="dropzone">
            {{ csrf_field() }}

        </form>
    </div>

@stop

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {
          paramName: 'photo',
          maxFilesize: 3,
          acceptedFiles: '.jpg, .png, .jpeg, .bmp'
        };
    </script>
@stop