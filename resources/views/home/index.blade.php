@extends('home.common.masterpage')

@section('content')

Aqui va el contenido de la página principal

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

@endsection