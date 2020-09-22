@extends('layouts.app')

@section('title', 'career | '.$career->title)

@section('description', '')


@section('content')
    <section class="career container">
        <div class="career-list">
            <h1 class="second-title">{{$career->title}}</h1>
            <div class="location">{{$career->location}}</div>

            <div class="content">
                {!! $career->lb_content !!}
            </div>
        </div>


    </section>
@endsection
