@extends('layouts.app')

@section('title', 'latest news')

@section('description', '')


@section('content')
    <section class="news container">
        <h1 class="main-title">News</h1>
        @foreach($news as $item)
        <div class="news-item row">
            <div class="col-sm-6">
                <div class="news-img">
                    <a href="{{url('news/'.$item->slug)}}">
                        <img src="{{$item->getThumbnailUrl()}}" alt="{{$item->title}}">
                    </a>

                </div>
            </div>
            <div class="col-sm-6">
                <div class="news-list">
                    <div class="news-txt1">
                        <span class="news-type">{{$item->type->name}}</span>
                        <span class="news-date">{{$item->getPublishDate()}}</span>
                    </div>
                    <div class="news-subtitle">
                        <a href="{{url('news/'.$item->slug)}}">
                        {{Str::words($item->title ,10,'...')}}
                        </a>
                    </div>
                    <div class="news-txt2">
                        {!! Str::words(strip_tags($item->lb_content),60,'...') !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection

