@extends('welcome')
@section('content')
<div class="movie mt-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="./static/assets/imgs/img-main.jpg" alt="" class="movie__main--img">
            </div>
            <div class="col-lg-6">
                <div class="movie__detail">
                    <div class="row-1">
                        <h2 class="movie__name">Tên phim</h2>
                        <div class="assess">
                            <img src="./static/assets/icons/star.svg" alt="">
                            <span>7.8/10 </span>
                        </div>
                    </div>
                    <div class="row-2">
                        <span class="year">2023</span>
                        <span class="genre">Drama</span>
                        <span class="time">2h 38m</span>
                    </div>
                    <div class="row-3">
                        <p class="movie__desc">The movie follows the lives of a wealthy family, the Johnsons, who appear
                            to have it all: a grand mansion, luxurious cars, and expensive designer clothing. However,
                            behind the facade of their lavish lifestyle, there are deep-seated tensions and secrets that
                            threaten to tear the family apart.</p>
                    </div>
                    <div class="primary-action">
                        <a href="#!" class="primary-watch"><img src="./static/assets/button/watch-now.svg" alt="" /></a>
                        <a href="#!" class="primary-save" id="likeButton">
                            <img src="./static/assets/button/like.svg" class="likeImage" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection