@extends('welcome')
@section('content')
    <div class="movie mt-header">
        <div class="row">
            <video style="height: 80vh" controls autoplay>
                <source src="{{url('/uploads/'.$movie->video)}}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
@endsection
