<div class="nav__inner">
    <a href="#!" class="logo">
        <!-- <img src="./static/assets/icons/heart.svg" alt="" class="logo__img" /> -->
        <img src="./static/assets/icons/logo.svg" alt="" class="logo__img" />
    </a>

    <!-- Nav 1 -->
    <ul class="nav flex-column nav-1">
        <ul class="nav flex-column nav-1">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('web.home') }}">
                    <img src="{{ asset('static/assets/icons/film.svg') }}" alt="" class="nav-link__logo" />
                    <p>Trang chủ</p>
                </a>
            </li>
            @auth('web')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('web.favorites') }}">
                    <img src="{{ asset('static/assets/icons/heart.svg') }}" alt="" class="nav-link__logo" />
                    <p>Yêu thích</p>
                </a>
            </li>
            @endauth
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="{{ asset('static/assets/icons/trending.svg') }}" alt="" class="nav-link__logo" />
                    <p>Thịnh hành</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <img src="{{ asset('static/assets/icons/calendar.svg') }}" alt="" class="nav-link__logo" />
                    <p>Sắp ra mắt</p>
                </a>
            </li>
        </ul>
    </ul>

    <!-- Nav 2 -->
    <ul class="nav flex-column nav-2">
        <li class="nav-item">
            <a class="nav-link" href="">
                <img src="./static/assets/icons/user.svg" alt="" class="nav-link__logo" />
                Community
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <img src="./static/assets/icons/message.svg" alt="" class="nav-link__logo" />
                Social
            </a>
        </li>
    </ul>
</div>
