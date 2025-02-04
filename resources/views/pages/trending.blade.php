@extends('welcome')
@section('content')

<main class="main-content mt-header">
    <section class="feature">
        <h2 class="feature-heading">Xu hướng</h2>
        <div class="carousel row">
            <section class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="movie-item">
                    <a href="/path-to-movie-detail" class="movie-link">
                        <img src="./static/assets/imgs/movie-2.jpg" alt="Tên phim" loading="lazy"
                            class="movie-item__img" />
                        <div class="movie-info">
                            <h3 class="movie__heading">Movie Name</h3>
                            <p class="movie__desc">120 min</p>
                        </div>
                    </a>
                </div>
            </section>
            <section class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="movie-item">
                    <a href="/path-to-movie-detail" class="movie-link">
                        <img src="./static/assets/imgs/movie-2.jpg" alt="Tên phim" loading="lazy"
                            class="movie-item__img" />
                        <div class="movie-info">
                            <h3 class="movie__heading">Movie Name</h3>
                            <p class="movie__desc">120 min</p>
                        </div>
                    </a>
                </div>
            </section>
            <section class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="movie-item">
                    <a href="/path-to-movie-detail" class="movie-link">
                        <img src="./static/assets/imgs/movie-2.jpg" alt="Tên phim" loading="lazy"
                            class="movie-item__img" />
                        <div class="movie-info">
                            <h3 class="movie__heading">Movie Name</h3>
                            <p class="movie__desc">120 min</p>
                        </div>
                    </a>
                </div>
            </section>
    </section>
</main>
@endsection