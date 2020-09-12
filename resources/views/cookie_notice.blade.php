@extends('layouts.app')

@section('title', 'Cookie Notice')

@section('description', '')


@section('content')

    <section class="introduce container cookie">
        <h1 class="main-title">Cookie Notice</h1>
        <p class="main-txt">
            We want to ensure that you enjoy visiting and using UTU. In order to enhance
            your experience, we place small amounts of data called ‘cookiesʼ onto your
            computer. This Cookie Notice is given by and on behalf of the relevant
            contracting UTU entity specified in the Terms of Use.
        </p>
        <p class="main-txt">
            You should carefully review this Cookie Notice, as well as the Terms of Use and
            all other Policies specified in the Terms of Use before proceeding.
        </p>
    </section>

@endsection

@section('javascript')
    <script src="{{mix('js/index.js')}}"></script>
@endsection
