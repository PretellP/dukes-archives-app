<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">

        <div class="sidebar-brand p-3">
            <a href="{{ route('admin.dashboard.index') }}">
                <img src="" class="w-100" alt="">
            </a>
        </div>

        <div class="sidebar-brand hidden sidebar-brand-sm p-1 align-items-center">
            <a href="{{ route('admin.dashboard.index') }}">
                <img src="" class="w-100" alt="">
            </a>
        </div>

        <ul class="sidebar-menu">

            {{-- <li class="{{setActive('admin.dashboard.*')}}">
                <a href="{{route('admin.dashboard.index')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li> --}}

            <li class="{{setActive('admin.users.*')}}">
                <a href="{{route('admin.users.index')}}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Usuarios</span>
                </a>
            </li>

            <li class="{{setActive('admin.labels.*')}}">
                <a href="{{route('admin.labels.index')}}" class="nav-link">
                    <i class="fa-solid fa-tags"></i>
                    <span>Categorías</span>
                </a>
            </li>

            <li class="{{setActive('admin.products.*')}}">
                <a href="{{route('admin.products.index')}}" class="nav-link">
                    <i class="fa-solid fa-boxes-stacked"></i>
                    <span>Productos</span>
                </a>
            </li>

            <li class="{{setActive('admin.announcements.*')}}">
                <a href="{{route('admin.announcements.index')}}" class="nav-link">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>Anuncios</span>
                </a>
            </li>

            {{-- <li class="">
                <a href="" class="nav-link">
                    <i class="fa-solid fa-layer-group"></i>
                    <span>Inventario</span>
                </a>
            </li> --}}

            <ul class="sidebar-menu txt-divider">
                <li class="">
                    <a class="nav-link" href="javascript:void(0);">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Reportes</span>
                    </a>
                </li>
            </ul>

            <li class="{{setActive('admin.customers.*')}}">
                <a href="{{ route('admin.customers.index') }}" class="nav-link">
                    <i class="fa-solid fa-user-tag"></i>
                    <span>Clientes</span>
                </a>
            </li>

            <li class="{{ setActive('admin.sales.*') }}">
                <a href="{{ route('admin.sales.index') }}" class="nav-link">
                    <i class="fa-solid fa-circle-dollar-to-slot"></i>
                    <span>Ventas</span>
                </a>
            </li>


            <li class="logout mt-5">
                <a href="#" class="nav-link" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                   <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Cerrar sesión</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>

        </ul>

    </aside>
</div>
