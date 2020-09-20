@extends('layouts.app')

@section('title', 'news | '.$news->title)

@section('description', '')


@section('content')
    <section class="news-detail container">
        <h1 class="main-title">News</h1>
        <div class="news-banner">
            <img src="{{$news->getOriginalImagelUrl()}}" alt="">
        </div>
        <div class="news-list">
            <div class="news-txt1">
                <span class="news-type">{{$news->type->name}}</span>
                <span class="news-date">{{$news->getPublishDate()}}</span>
            </div>

            <div class="news-subtitle">
                {{$news->title}}
            </div>

            <div class="news-txt2">
                {!! $news->lb_content !!}
            </div>

            <div class="news-copyright">
                Disclaimer<br>
                Important: All material is provided subject to this important notice and you must familiarize yourself with its terms. The notice contains important information, limitations and restrictions relating to our software, publications, trademarks, third-party resources and forward-looking statements. By accessing any of our material, you accept and agree to the terms of the notice.
            </div>
        </div>

    </section>
@endsection

