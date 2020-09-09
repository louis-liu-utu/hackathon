@extends('layouts.app')

@section('title', 'Contact Us')

@section('description', '')



@section('content')
    <section class="message">
        <div class="container">
            <h1 class="second-title">Thank You for Requesting Beta Access!</h1>

            <p class="second-txt">We're excited for you to join our community. We'll send a confirmation email to the address you provided, and stay tuned for updates.</p>
            <p class="second-txt">-The UTU team</p>
            <div class="message-button">
                <a href="{{url('/')}}" class="button">
                    Back To Homepage
                </a>
            </div>
        </div>
    </section>

@endsection

