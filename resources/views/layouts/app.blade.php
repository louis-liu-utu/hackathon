<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>UTU - @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">

    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/site.webmanifest">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    @section('style')
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @show
    <link rel="stylesheet" href="{{asset('css/fonts/iconfont.css')}}">

</head>
<body>
<header>
    <nav class="header">
        <div class="container">
            <div class="log-txt">
                <a href="{{url('/')}}">
                    UTU.ONE
                </a>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <a href="{{url('/')}}">
                <div class="logo"></div>
                </a>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col">
                        <h3>INFO</h3>
                        <ul>
                            <li>
                                <a href="{{url('get-started   ')}}">Sign up for updates</a>
                            </li>
                            <li>
                                <a href="{{url('help-center')}}">Help Center</a>
                            </li>
                            <li><a href="{{url('careers')}}">Careers </a></li>
                        </ul>
                    </div>
                    <div class="col">

                        <h3>COMMUNICATION</h3>
                        <ul>
                            <li><a href="https://twitter.com/UTU47298207" target="_blank">Twitter</a></li>
                            <li><a href="">Blog</a></li>
                            <li><a href="{{url('contact-us')}}">Contact us</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h3>LEGAL</h3>
                        <ul>
                            <li><a href="{{url('about-us')}}">Foreword</a></li>
                            <li><a href="{{url('ground-rules')}}">Ground Rules</a></li>
                            <li><a href="{{url('term-of-use')}}">Terms of Use</a></li>
                            <li><a href="{{url('privacy-notice')}}">Privacy Notice</a></li>
                            <li><a href="{{url('cookie-notice')}}">Cookie Notice</a></li>
                            <li><a href="">Trademark Notice</a></li>
                            <li><a href="">Copyright Policy</a></li>
                        </ul>
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
