@extends('layouts.app')

@section('title', 'Privacy Notice')

@section('description', '')


@section('content')

    <section class="privacy-notice container">
        <h1 class="main-title">Privacy Notice</h1>
        <p class="main-txt">
            This privacy policy provides information on what personal data we collect from
            you, how we collect it, use it and share it. We apply this privacy policy in
            accordance with applicable laws where we operate. In some cases, we may
            provide additional information specific to certain features, activities or regions.
        </p>
        <h2 class="second-title">Data Privacy</h2>
        <p class="main-txt">
            Accountability for and transparency about the way in which we handle your personal data are extremely important to us where we are acting as a data controller with respect to your data. This Privacy Notice is given by and on behalf of the relevant contracting UTU entity specified in the Terms of Use.
            You should carefully review this Privacy Notice, as well as the Terms of Use and all other Policies specified in the Terms of Use before proceeding.
            Where law or regulation requires us to provide you with a notice, or other explanation of the information about you that we collect and process (or similar), this Privacy Notice shall be understood as fulfilling our obligation to provide you with such notice or explanation.
        </p>
    </section>

@endsection

@section('javascript')
    <script src="{{mix('js/index.js')}}"></script>
@endsection
