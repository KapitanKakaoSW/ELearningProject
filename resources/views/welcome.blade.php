<!DOCTYPE html>
<html>
<head>
    <title>Главная страница</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    @guest
        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Sign up</a>
    @else
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    @endguest
</div>
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
