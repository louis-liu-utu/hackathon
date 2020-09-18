@extends('layouts.app')

@section('title', 'Careers')

@section('description', '')


@section('content')
    <section class="news container">
        <h1 class="main-title">News</h1>
        @foreach($news as $item)
        <div class="news-item row">
            <div class="col-sm-6">
                <div class="news-img">
                    <img src="{{$item->getThumbnailUrl()}}" alt="{{$item->title}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="news-list">
                    <div class="news-txt1">
                        <span class="news-type">{{$item->type->name}}</span>
                        <span class="news-date">{{date('d M yy',strtotime($item->published_at))}}</span>
                    </div>
                    <div class="news-subtitle">
                        {{Str::words($item->title ,10,'...')}}
                    </div>
                    <div class="news-txt2">
                        {!! Str::words($item->lb_content,60,'</div>...') !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </section>
@endsection

