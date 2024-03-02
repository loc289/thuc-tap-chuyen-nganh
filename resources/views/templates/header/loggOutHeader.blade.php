<div class="banner">

    <div class="top-bar">
        <ul class="top-list">
            <li>
                <a class="top-link" href="#!">Movies</a>
            </li>
            <li>
                <a class="top-link" href="#!">Series</a>
            </li>
            <li>
                <a class="top-link" href="#!">Documentaries</a>
            </li>
        </ul>
        <div class="top-act">
            <div class="top-act__group">
                <a href="#!" class="top-act__search">
                    <img src="{{ asset('static/assets/icons/search.svg') }}" alt="" />
                </a>
                <a href="#!" class="top-act__noti">
                    <img src="{{ asset('static/assets/icons/bell.svg') }}" alt="" />
                </a>

                <!-- Dropdown -->
                @include('components.dropdown.dropdown-logOut')

            </div>
        </div>
    </div>
    <div class="banner_inner">
        <h1 class="primary-movie-name">Tên phim</h1>
        <p class="primary-movie-info">Thông tin phim</p>
        <div class="primary-action">
            <a href="#!" class="primary-watch"><img src="{{ asset('static/assets/button/watch-now.svg') }}" alt=""></a>
            <a href="#!" class="primary-save" id="likeButton">
                <img src="{{ asset('static/assets/button/like.svg') }}" class="likeImage" alt="">
            </a>
        </div>
    </div>
</div>