@extends('layouts.app')

@section('title', 'Contact Us')

@section('description', '')

@section('content')
    <section class="message">
        <div class="container">
            <h1 class="second-title">Thank You for Contact Us!</h1>

            <p class="second-txt">We will handle your question and return back to you.</p>
            <p class="second-txt">-The UTU team</p>
            <div class="message-button">
                <a href="{{url('/')}}" class="button">
                    Back To Homepage
                </a>
            </div>
        </div>
    </section>

@endsection

