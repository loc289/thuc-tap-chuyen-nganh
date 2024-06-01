<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu quản lý</li>

                <li>
                    <a href="{{ route('users.index') }}" class=" waves-effect">
                        <span>Khách hàng</span>
                    </a>
                    <a href="{{ route('categories.index') }}" class=" waves-effect">
                        <span>Thể loại phim</span>
                    </a>
                    <a href="{{ route('nations.index') }}" class=" waves-effect">
                        <span>Quốc gia</span>
                    </a>
                    <a href="{{ route('movies.index') }}" class=" waves-effect">
                        <span>Phim</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Left Sidebar End -->
