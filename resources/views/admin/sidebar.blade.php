<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="{{ url('assets/#')}}">
            <img src="{{ url('assets/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="active has-sub">
                    <a class="js-arrow" href="{{ url('#')}}">
                        <i class="fas fa-tachometer-alt"></i>Data Master</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ url('product')}}">
                                <i class="fas fa-table"></i>Data Barang</a>
                        </li>
                        <li>
                            <a href="{{ url('category')}}">
                                <i class="fas fa-table"></i>Data Kategori</a>
                        </li>
                        <li>
                            <a href="{{ url('assets/table.html')}}">
                                <i class="fas fa-table"></i>Data Pemesanan</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
