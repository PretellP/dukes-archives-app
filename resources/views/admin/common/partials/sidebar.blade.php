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

            <li class="{{setActive('admin.dashboard.*')}}">
                <a href="{{route('admin.dashboard.index')}}" class="nav-link">
                    <i class="fa-solid fa-house"></i>
                    <span>Inicio</span>
                </a>
            </li>

            <li class="{{setActive('admin.users.*')}}">
                <a href="{{route('admin.users.index')}}" class="nav-link">
                    <i class="fa-solid fa-users"></i>
                    <span>Usuarios</span>
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