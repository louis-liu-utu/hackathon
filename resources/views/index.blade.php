@extends('layouts.app')

@section('title', 'redefine social platform | blockchain token | real people only | benefit members')

@section('description', 'UTU is a social platform built on blockchain, for real people only and benefit members')

@section('style')
    <link rel="stylesheet" href="{{mix('css/index.css')}}">
@endsection

@section('content')
    <section class="home0" >
        <video id="video" >
            <source src="{{url('files/utu_promo.mp4')}}" type="video/mp4">
            <source src="{{url('files/utu_promo.webm')}}" type="video/webm">
            <source src="{{url('files/utu_promo.ogg')}}" type="video/ogg">
            Your browser does not support HTML video.
        </video>
    </section>

<section class="home1">
    <div class="container">
         <div class="home1-bg">
             <div class="home1-txt">
                 <div class="home1-txt-title">
                     <div class="home1-txt-title1">
                         <h1 class="home1-txt-title1-txt">
                         redefine
                         </h1>
                        <div class="home1-txt-sm">
                             Watch film <span id="icon-Player" class="iconfont icon-Player"></span>
                         </div>
                     </div>
                     <div class="home1-txt-title-img">
                         <img src="{{url('/images/home-phone1.png?v=3')}}" alt="utu social platform">
                     </div>
                     <h1 class="home1-txt-title2">
                         social
                     </h1>
                 </div>
                 <div class="home1-icons">

                     <div class="home1-icons-item">
                         {{--<div class="home1-icons-img">
                             <img src="{{url('images/android_download.png')}}" alt="utu App Android Download">
                         </div>
                         @if(\App\Helpers\AppSoftware::has('android beta'))
                         <a  href="{{url('app-download/android beta')}}" class="home1-icons-txt">
                             Android Download
                         </a>
                         @else
                             <a class="home1-icons-txt disable">
                                 Android Download
                             </a>
                         @endif --}}

                     </div>

                     <div class="home1-icons-item">
                         {{--  <div class="home1-icons-img">
                              <img src="{{url('images/apple_download.png')}}" alt="utu App Apple Download">
                          </div>
                          @if(\App\Helpers\AppSoftware::has('apple beta'))
                              <a href="{{url('app-download/apple beta')}}"  class="home1-icons-txt">
                                  TestFlight Download
                              </a>
                          @else
                              <a class="home1-icons-txt disable">
                                  TestFlight Download
                              </a>
                          @endif --}}

                     </div>
                 </div>
             </div>

         </div>

    </div>
</section>
<section class="home2">
    <div class="container">
        <h1 class="home2-title">
            UTU is a social platform
            built to benefit members
        </h1>
        <p class="home2-txt">
            Traditional social media platforms are built to invade privacy
            and sell personal data to profit the few.
        </p>
        <p class="home2-txt">
            UTU gives the benefit back to members by rewarding their attention.
        </p>
    </div>
</section>
<section class="home3">
    <div class="container">
        <div class="home3-list">
            <h2 class="home3-title">UTU is a social platform</h2>
            <h2 class="home3-title">for real people</h2>
            <h2 class="home3-title"> ONLY</h2>
            <div class="home3-img">
                <img src="{{url('/images/home3-phone.png?v=1')}}" alt="utu social platform real people">
            </div>
            <div class="home3-txt">
                <ul>
                    <li>360 bio verification, one account per person,</li>
                    <li>no bots or fake accounts. Decentralised Identity</li>
                    <li>provides security, transparency and trust that</li>
                    <li>was not possible before.</li>
                </ul>
            </div>

        </div>
    </div>
</section>
<section class="home2">
    <div class="container">
        <h1 class="home2-title">
            UTU is a social platform
            built on blockchain
        </h1>
        <p class="home2-txt">

            <span class="br"> EOSIO open source blockchain infrastructure and
            </span>
            smart contracts provide transparency and trust.
            <br>
            No shady algorithms and misleading information.
            <br>
            No manipulating news feeds driven by profit.
            <br>
            UTU gives control back to users and community.
        </p>
    </div>
</section>
<section class="home4">
    <div class="container">
        <h2 class="home4-title">
            Innovation & familiar features
        </h2>
        <div class="home4-list row">
            <div class="home4-item col-sm-12">
                <div class="home4-item-list ">
                    <i class="circle circle-red"></i>
                    <p class="home4-item-txt">
                        Anyone can use UTU,
                        it’s FREE & EASY
                    </p>
                </div>
            </div>
            <div class="home4-item col-sm-4 home4-item-list-column">
                <div class="home4-item-list home4-item-list-bottom">
                    <i class="circle  circle-light-blue"></i>
                    <p class="home4-item-txt">
                        <span class="br">Create a group chat</span>
                        up to 5000 members
                    </p>
                </div>
                <div class="home4-item-list">
                    <i class="circle circle-dark-blue"></i>
                    <p class="home4-item-txt">
                        Group video conference
                        up to 300 members
                    </p>
                </div>
            </div>

            <div class="home4-item home4-item-img col-sm-4">
                <img src="{{url('/images/home4-phone.png')}}" alt="utu Innovation, familiar features">
            </div>

            <div class="home4-item col-sm-4 home4-item-list-column">
                <div class="home4-item-list home4-item-reverse">
                    <i class="circle circle-grey"></i>
                    <p class="home4-item-txt">
                        Send picture,
                        short video & files
                    </p>
                </div>
                <div class="home4-item-list home4-item-reverse home4-item-list-bottom">
                    <i class="circle circle-yellow"></i>
                    <p class="home4-item-txt">
                        Chat, Voice & Video
                    </p>
                </div>
            </div>



        </div>
    </div>
</section>
<section class="home5">
    <div class="home5-bg-black">
        <div class="container">
            <div class="home5-list">
                <h3 class="home5-title">Share posts in your</h3>
                <h3 class="home5-title">private group</h3>

                <div class="home5-txt">
                    <ul>
                        <li>Traditional social platforms sell users attention</li>
                        <li>UTU rewards members' actions</li>
                        <li>Complete community tasks</li>
                        <li>and get rewarded tokens by</li>
                        <li class="icons-list">
                            <i class="iconfont icon-Share-Outline"></i> <i class="iconfont icon-like"></i> <i class="iconfont icon-comment"></i>
                        </li>
                        <li class="home5-txt-bold">Post Share Like Comment</li>
                    </ul>
                </div>
                <div class="home5-img">
                    <img src="{{url('/images/home5-phone.png?v=1')}}" alt="utu Share post in your private group">
                </div>
            </div>
        </div>
    </div>
    <div class="home5-bg-grey">
    </div>
</section>

<div class="home6">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="home6-txt-list">
                    <h3 class="home6-txt1">
                        Upgrade your group chat to a DAC
                    </h3>
                    <h3 class="home6-txt2">
                        all in just
                    </h3>
                    <h3 class="home6-txt3">
                        ONE click
                    </h3>
                </div>
            </div>
            <div class="col-sm-5">
                <div class="home6-img">
                    <img src="{{url('images/home6-phone.png')}}" alt="utu Decentralized Autonomous Community">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home7">
    <div class="container">
        <h1 class="home7-title">
            UTU takes community
            Further
        </h1>
        <h3 class="home7-txt">
            Create Decentralised Autonomous Community and tokens
        </h3>
        <div class="row">
            <div class="col-sm-5">
                <ul>
                    <li>Advanced DAC management</li>
                    <li>Custodians election</li>
                    <li>Worker proposal system</li>
                    <li>Referendum & Vote</li>
                    <li>Prediction</li>
                    <li>Tasks</li>
                    <li>Third party application</li>
                </ul>
            </div>
            <div class="col-sm-7">
                <div class="home7-img">
                    <img src="{{url('images/home7-phone.png?v=2')}}" alt="utu Decentralised Autonomous Community and token">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="home8">
    <div class="container">
        <div class="home8-list">
            <h4 class="home8-title">
                Wallet for everyone
            </h4>
            <div class="home8-img">
                <img src="{{url('images/home8-phone.png')}}" alt="utu Blockchain  Wallet">
            </div>
            <div class="row">
                <div class="col-sm-6 home8-txt-left">
                    <h4 class="home8-item-title">
                        Simple
                    </h4>
                    <p class="home8-item-txt">
                        No private and public key management
                    </p>
                    <p class="home8-item-txt">
                        No tech knowledge required
                    </p>
                    <p class="home8-item-txt">
                        Anyone can send, receive and trade
                    </p>
                </div>

                <div class="col-sm-6 home8-txt-right">
                    <h4 class="home8-item-title">
                        Secure
                    </h4>
                    <p class="home8-item-txt">
                        All your assets are recorded on
                        </p>
                    <p class="home8-item-txt">
                    the EOSIO open source blockchain
                        Secure and immutable
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="home9">
    <div class="container">
        <div class="home9-list">
            <div class="home9-img">
                <img src="{{url('images/home9-phone.png')}}" alt="utu Defi 2.0">
            </div>
            <div class="home9-title-list">
                <h1 class="home9-title">
                    Free & Instant
                </h1>
              {{--  <div class="home9-subtitle">
                    Free and instant swap between DAC tokens
                </div>--}}
            </div>

            <p class="home9-txt">
                Next Gen AMM system leveraging the world's
                most powerful blockchain - EOSIO
                provide easy & smooth experience for mass
                adoption
            </p>
        </div>
    </div>
</div>

<div class="home10">
    <div class="container">

        <h4 class="home10-title">
            Be part of the movement
        </h4>
        <div class="home10-button">
            <a href="{{url('/get-started')}}" class="button">
                Request Beta Access
            </a>
        </div>
        <div class="home10-img">
            <img src="{{url('images/home10-phone.png')}}" alt="utu Request Beta Access">
        </div>
    </div>
</div>

@endsection

@section('javascript')
    <script src="{{mix('js/index.js')}}"></script>
@endsection
