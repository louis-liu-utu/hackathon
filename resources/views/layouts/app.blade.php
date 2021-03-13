<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTU - @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    @section('style')
        <link rel="stylesheet" href="{{mix('css/app.css')}}">
    @show
    <link rel="stylesheet" href="{{asset('css/fonts/iconfont.css')}}">

</head>
<body>
<header>
    <nav class="header">
        <div class="container">

        </div>
    </nav>
</header>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">

            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                    </div>
                    <div class="col">

                    </div>
                </div>
            </div>

        </div>
    </div>
</footer>

<div class="to-top">
    <span class="iconfont icon-arrow-up"></span>
</div>

</body>

@yield('javascript')

</html>
