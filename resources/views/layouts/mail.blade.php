<!doctype html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style>
        img {
            border: none;
            -ms-interpolation-mode: bicubic;
            max-width: 100%; }
        body {
            height: 100%;
            font: 14px -apple-system,BlinkMacSystemFont,sans-serif;
            -webkit-font-smoothing: antialiased;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%; }

        .footer {
            max-width: 750px;
            margin: 0 auto;
            margin-bottom: 50px;
        }
        .footer .logo {
            max-width: 300px;
            height: auto;
            width: 100%;
        }
        @media only screen and (max-width: 620px) {
            .footer .logo {
                max-width: 200px;
            }
        }
        .footer .txt {
            font-size: 12px;
            opacity: .6;
            color: #000;
        }
        .footer a {
            color: #000;
        }

        /* -------------------------------------
            TYPOGRAPHY
        ------------------------------------- */
        h1,
        h2,
        h3,
        h4 {
            color: #000000;
            font-family: -apple-system,BlinkMacSystemFont,sans-serif;
            font-weight: 400;
            line-height: 1.4;
            margin: 0;
            Margin-bottom: 30px; }
        h1 {
            font-size: 35px;
            font-weight: 300;
            text-align: center;
            text-transform: capitalize; }
        p,
        ul,
        ol {
            font-family: -apple-system,BlinkMacSystemFont,sans-serif;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
            Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
            list-style-position: inside;
            margin-left: 5px; }
        a {
            color: #3498db;
            text-decoration: underline; }

        /* -------------------------------------
            OTHER STYLES THAT MIGHT BE USEFUL
        ------------------------------------- */
        .last {
            margin-bottom: 0; }
        .first {
            margin-top: 0; }
        .align-center {
            text-align: center; }
        .align-right {
            text-align: right; }
        .align-left {
            text-align: left; }
        .clear {
            clear: both; }
        .mt0 {
            margin-top: 0; }
        .mb0 {
            margin-bottom: 0; }
        .preheader {
            color: transparent;
            display: none;
            height: 0;
            max-height: 0;
            max-width: 0;
            opacity: 0;
            overflow: hidden;
            mso-hide: all;
            visibility: hidden;
            width: 0; }
        .powered-by a {
            text-decoration: none; }
        hr {
            border: 0;
            border-bottom: 1px solid #f6f6f6;
            Margin: 20px 0; }



            .request {
                max-width: 750px;
                margin: 200px auto 100px;
            }
            .request .title {
                font-weight: 500;
                text-align: left;
            }
            .request .primary-txt{
                font-size: 26px;
                opacity: .6;
            }
    </style>
    @yield('style')
</head>
<body>

@yield('content')


<div class="footer">
    <a href="{{url('/')}}" target="_blank"><img class="logo"  src="{{url('images/email-logo.png')}}"> </a>
    <p class="second-txt txt">
        You are receiving this email because you registered your interest in UTU.<br>
        if you no longer wish to receive these email you can Unsubscribe from this list at
        any time.<br>
        Please familiarise yourself with our <a href="{{url('/term-of-use')}}" target="_blank">Terms of Use</a>  and <a
            href="{{'/privacy-notice'}}" target="_blank">Privacy Policy</a>
    </p>
    <p class="third-txt txt">
        Copyright &copy; {{date("Y")}} UTU. All rights reserved.
    </p>
</div>
</body>
</html>
