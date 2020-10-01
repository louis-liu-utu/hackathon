@extends('layouts.mail')

@section('style')
    <style>
        table {
            border-collapse: separate;
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
            width: 100%; }
        table td {
            font-family: sans-serif;
            font-size: 14px;
            vertical-align: top; }
        /* -------------------------------------
            BODY & CONTAINER
        ------------------------------------- */

        /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
        .container {
            display: block;
            Margin: 0 auto !important;
            /* makes it centered */
            max-width: 750px;
            width: 750px; }
        /* This should also be a block element, so that it will fill 100% of the .container */
        .content {
            box-sizing: border-box;
            display: block;
            Margin: 0 auto;
            max-width: 750px;
            padding: 10px; }
        /* -------------------------------------
            HEADER, FOOTER, MAIN
        ------------------------------------- */
        .main {
            background: #fff;
            width: 100%; }
        .main .title {
            text-align: left;
            font-size: 44px;
            font-weight: 500;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.25;
            letter-spacing: 0.44px;
        }
        .main p {
            font-size: 33px;
            font-weight: normal;
            font-stretch: normal;
            font-style: normal;
            line-height: 1.18;
            letter-spacing: normal;
            text-align: left;
            color: #707070;
        }
        .main .code {
            font-weight: 600;
            color: #333;
        }
        .main .store {
            padding: 30px;
        }

        .download-wrap {
            text-align: center;
            margin-top: 20px;
        }
        .download-icon {
            width: 40px;
            height: 40px;
            vertical-align:middle;
        }
        .download-text {
            font-size: 20px;
            font-weight: 400;
            line-height: 40px;
            height: 40px;
            border: 1px solid #707070;
            transition: all .5s;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            color: #000;
            vertical-align:bottom;
            padding: 8px 10px;
        }
        .download-text:hover {
            border: 1px solid #2185d0;
            color: #fff;
            background-color: #2185d0;
        }

        @media only screen and (max-width: 620px) {
            .main .store {
                padding: 10px;
            }

        }
        .wrapper {
            box-sizing: border-box;
        }


        @media only screen and (max-width: 620px) {
            table[class=body] h1 {
                font-size: 28px !important;
                margin-bottom: 10px !important; }
            table[class=body] p,
            table[class=body] ul,
            table[class=body] ol,
            table[class=body] td,
            table[class=body] span,
            table[class=body] a {
                font-size: 16px !important; }
            table[class=body] .wrapper,
            table[class=body] .article {
                padding: 10px !important; }
            table[class=body] .content {
                padding: 0 !important; }
            table[class=body] .container {
                padding: 0 !important;
                width: 100% !important; }
            table[class=body] .main {
                border-left-width: 0 !important;
                border-radius: 0 !important;
                border-right-width: 0 !important; }
            table[class=body] .btn table {
                width: 100% !important; }
            table[class=body] .btn a {
                width: 100% !important; }
            table[class=body] .img-responsive {
                height: auto !important;
                max-width: 100% !important;
                width: auto !important; }
            .main .title {
                font-size: 28px;
            }
            .main p {
                font-size: 16px;
                margin-bottom: 0;
            }
            .download-icon {
                width: 20px;
                height: 20px;
            }
            .download-wrap .download-text {
                line-height: 20px;
                height: 20px;
                font-size: 12px !important;
            }
            .footer {
                margin-right: 15px;
                margin-left: 15px;
            }
        }
        @media all {
            .ExternalClass {
                width: 100%; }
            .ExternalClass,
            .ExternalClass p,
            .ExternalClass span,
            .ExternalClass font,
            .ExternalClass td,
            .ExternalClass div {
                line-height: 100%; }
            .apple-link a {
                color: inherit !important;
                font-family: inherit !important;
                font-size: inherit !important;
                font-weight: inherit !important;
                line-height: inherit !important;
                text-decoration: none !important; }
           }

    </style>
@endsection

@section('content')
<table border="0" cellpadding="0" cellspacing="0" class="body">
    <tr>
        <td>&nbsp;</td>
        <td class="container">
            <div class="content">
                <table class="main">

                    <!-- START MAIN CONTENT AREA -->
                    <tr>
                        <td class="wrapper">
                            <table border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <h1 class="title">Welcome to UTU</h1>
                                        <p>Hi {{$invitedCode->customer->first_name ?? ''}},</p>
                                        <br>
                                        <p>You’ve been invited to join UTU! Let’s take social back from Big Tech and create social as it should be, together.  </p>
                                        <br>
                                        <p>First, go ahead and copy your invitation code: </p>
                                        <br>
                                        <p class="code">{{$invitedCode->code ?? ''}}</p>
                                        <br>
                                        <p>Next, in order to create an account you will need to download the app.</p>


                                        <table border="0" cellpadding="0" cellspacing="0">
                                            <tbody>
                                            <tr>
                                                <td align="left">
                                                    <table border="0" cellpadding="0" cellspacing="0">
                                                        <tbody>
                                                        <tr>
                                                          {{--  <td class="store"> <a  href="{{config('app.app_apple_store_download_link')}}" target="_blank">
                                                                    <img src="{{url('images/apple_store_download.png')}}" alt="">
                                                                </a>
                                                            </td>--}}

                                                         {{--   <td class="store"> <a  href="{{url('app-download/android beta')}}" target="_blank">
                                                                    <img src="{{url('images/google_store_download.png')}}" alt="">
                                                                </a>
                                                            </td>
                                                            <td></td>--}}
                                                          {{--  <td class="store"> <a   href="{{config('app.app_google_store_download_link')}}" target="_blank">
                                                                    <img src="{{url('images/google_store_download.png')}}" alt="">
                                                                </a>
                                                            </td>--}}
                                                            @if(\App\Helpers\AppSoftware::has('android beta'))
                                                            <td>
                                                                <div class="download-wrap">
                                                                    <img class="download-icon" src="{{url('images/android_download.png')}}" alt="">
                                                                    <a class="download-text" href="{{url('app-download/android beta')}}">Android Download</a>
                                                                </div>
                                                            </td>
                                                            @endif

                                                            @if(\App\Helpers\AppSoftware::has('apple beta'))
                                                            <td>
                                                                <div class="download-wrap">
                                                                    <img class="download-icon" src="{{url('images/apple_download.png')}}" alt="">
                                                                    <a class="download-text" href="{{url('app-download/apple beta')}}">Apple Download</a>
                                                                </div>
                                                            </td>
                                                            @endif
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                        <br>

                                        <p>After the app is installed on your device, click “I have my invite code” on the login page, or select “Get started” to create your UTU account.</p>
                                        <br>
                                        <p>Three things to note:</p>
                                        <p>You must complete the process once you begin, or you might get stuck in our system
                                        </p>
                                        <br>
                                        <p>Your profile picture will be pulled from your signup selfie.  The ability to update your profile picture will be available soon.
                                        </p>
                                        <br>
                                        <p>UTU is a social platform built for real people, that means we work hard to ensure all accounts are created by people, and all people only create one account. Please do not attempt to create duplicate accounts, as we will be monitoring in the background and freezing users suspected of creating duplicate accounts.
                                        </p>
                                        <br>
                                        <p>The email associated with your UTU account will be: {{$invitedCode->customer->email ?? ''}}.
                                        </p>
                                        <br>
                                        <br>
                                        <p>Got questions? Just hit reply, and we’re here to help, or visit our official website</p>
                                        <br>
                                        <br>
                                        <br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- END MAIN CONTENT AREA -->
                </table>


            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>
@endsection
