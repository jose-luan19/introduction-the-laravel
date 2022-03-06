<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Marketplace L6</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <style>
        .front.row {
            margin-bottom: 40px;
        }
        html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .full-height {
                height: 04vh;
            }
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }
            .position-ref {
                position: relative;
            }
            .top-right {
                position: absolute;
                right: 20px;
                top: 4px;
            }
            .content {
                text-align: center;
            }
            .title {
                font-size: 84px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
    </style>
    @yield('stylesheets')
</head>
<body>
    @guest
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
            @auth
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
                </div>
            @endif
        </div>
    @endguest

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="margin-bottom: 40px;">

        <a class="navbar-brand" href="{{route('home')}}">Marketplace L6</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>

            @auth
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item @if(request()->is('admin/stores*')) active @endif">
                        <a class="nav-link" href="{{route('admin.stores.index')}}">Lojas <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/products*')) active @endif">
                        <a class="nav-link" href="{{route('admin.products.index')}}">Produtos</a>
                    </li>
                    <li class="nav-item @if(request()->is('admin/categories*')) active @endif">
                        <a class="nav-link" href="{{route('admin.categories.index')}}">Categorias</a>
                    </li>
                </ul>

                <div class=" my-2 my-lg-0">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <span class="nav-link">{{auth()->user()->name}}</span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" onclick="event.preventDefault(); document.querySelector('form.logout').submit();">Sair</a>
                            <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            @endauth
            <div class="my-2 my-lg-0">
                <ul class="navbar-nav mr-auto">
                    {{-- <li class="nav-item">
                        <span class="nav-link">{{auth()->user()->name}}</span>
                    </li> --}}
                    <li class="nav-item">
                        <a href="{{ route("cart.index") }}" class="nav-link">
                            <i class="fa fa-shopping-cart fa-1x"></i>
                            @if (session()->has('cart'))
                                <span class="badge badge-danger">{{ count(session()->get('cart')) }}</span>
                            @else
                                <span class="badge badge-danger">0</span>
                            @endif
                        </a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault();
                                                                  document.querySelector('form.logout').submit(); ">Sair</a>

                        <form action="{{route('logout')}}" class="logout" method="POST" style="display:none;">
                            @csrf
                        </form>
                    </li> --}}
                </ul>
            </div>


        </div>
    </nav>

    <div class="container">
        @include('flash::message')
        @yield('content')
    </div>
    @yield('scripts')

</body>
</html>
