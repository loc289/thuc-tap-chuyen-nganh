@extends('welcome')
@section('content')
    <div class="movie mt-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{url('/uploads/'.$movie->image)}}" alt="" class="movie__main--img">
                </div>
                <div class="col-lg-6">
                    <div class="movie__detail">
                        <div class="row-1">
                            <h2 class="movie__name">{{ $movie->name }}</h2>
                            <div class="assess">
                                <img src="./static/assets/icons/star.svg" alt="">
                                <span>{{$movie->point}}</span>
                            </div>
                        </div>
                        <div class="row-2">
                            <span class="year">{{ $movie->release_date }}</span>
                            <span class="genre">{{ $movie->category->name }}</span>
                            <span class="time">{{ $movie->duration }} phút</span>
                        </div>
                        <div class="row-3">
                            <p class="movie__desc">{{ $movie->description }}</p>
                        </div>
                        <div class="primary-action">
                            <a href="{{ route('web.movie-watch', $movie->id) }}" class="primary-watch"><img
                                        src="{{ asset('static/assets/button/watch-now.svg') }}" alt=""/></a>

                            @auth('web')
                                <form action="{{ route('web.movie-like', $movie->id) }}" method="POST">
                                    @csrf
                                    <button class="primary-save" id="likeButton" type="submit">
                                        <img src="{{ asset('static/assets/button').(auth()->guard('web')->user()->checkFavorite($movie->id) ? '/liked.svg' : '/like.svg') }}" class="likeImage" alt="Like" />
                            </button>
                        </form>
                        @else
                        <p class="likeImage">Đăng nhập để thích phim!</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
