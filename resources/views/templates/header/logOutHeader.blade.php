    <header class="header">
        <div class="top-bar">
            <ul class="top-list">
                <li>
                    <a class="top-link" href="#!">Quốc gia</a>
                </li>
                <li>
                    <a class="top-link" href="#!">Phim lẻ</a>
                </li>
                <li>
                    <a class="top-link" href="#!">Phim bộ</a>
                </li>
            </ul>
            <div class="top-act">
                <div class="top-act__group">
                    <a href="#!" class="top-act__search">
                        <img src="./static/assets/icons/search.svg" alt="" />
                    </a>
                    <a href="#!" class="top-act__noti">
                        <img src="./static/assets/icons/bell.svg" alt="" />
                    </a>

                    <!-- Dropdown -->
                    @include('components.dropdown-logOut')

                </div>
            </div>
        </div>
    </header>