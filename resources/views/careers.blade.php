@extends('layouts.app')

@section('title', 'Careers')

@section('description', '')


@section('content')

    <section class="careers container">
        <h1 class="main-title">Careers</h1>
        <p class="main-txt">
            At UTU, we are on a mission to redefine social media as we know it. UTU is a social media platform that empowers and respects user.
            We are always seeking talent individuals worldwide to join our dynamic team.
        </p>
        <div class="careers-list">
            <h2 class="second-title">Current Job Openings</h2>
            @foreach($careers as $career)
            <div class="careers-item">
                <h3 class="careers-item-title">
                    <a href="{{url('careers/'.$career->slug)}}">{{$career->title}}</a>
                </h3>
                <p class="careers-item-txt">
                    {{$career->location}}
                </p>
            </div>
            @endforeach
           {{-- <div class="careers-item">
                <h3 class="careers-item-title">
                    Product Designer
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Senor UIUX Designer
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Software Engineer, Full Stack
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Software Engineer, Front End
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Software Engineer, Blockchain
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Art Director
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Data Scientist
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>
            <div class="careers-item">
                <h3 class="careers-item-title">
                    Engagement Marketing Manager
                </h3>
                <p class="careers-item-txt">
                    Melbourne,AU
                </p>
            </div>--}}

        </div>


    </section>

@endsection

@section('javascript')
    <script src="{{mix('js/index.js')}}"></script>
@endsection
