<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/vendor/front/libs/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="/vendor/front/images/logo.png" type="image/x-icon">

    <link rel="stylesheet" href="/vendor/back/AdminLTE.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    @stack('css')
    <title>@yield('title')</title>
</head>
<body>
<div class="container pb-3">
    <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link {{ active([ route('dashboard'), route('dashboard') ]) }}" href="{{route('dashboard')}}">@lang('admin.home')</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link {{ active([ route('order'), route('order').'/*' ]) }}" href="{{route('order')}}">@lang('admin.orders.title')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ active([ route('post'), route('post').'/*' ]) }}" href="{{route('post')}}">@lang('admin.posts.title')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ active([ route('photo'), route('photo').'/*' ]) }}" href="{{route('photo')}}">@lang('admin.photo.title')</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ active([ route('slider'), route('slider').'/*' ]) }}" href="{{route('slider')}}">@lang('admin.slider.title')</a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto " href="{{route('dashboard')}}">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">@lang('admin.goto')</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link pr-2" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                       @lang('admin.logout')<i class="fas fa-sign-out-alt"></i>

                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>

            </ul>
        </div>
    </nav>

</div>

<div class="container">
    <!-- Content here -->
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
@stack('js')

</body>
</html>
