@extends('layouts.app')

@section('title', 'Help Center')

@section('description', '')


@section('content')

<section class="help-center">
    <h1 class="main-title">Help Center</h1>
    <div class="help-center-list">
        <ul>
            <li>
                <span class="icon"></span> Welcome to UTU
            </li>
            <li>
                <span class="icon"></span> Beta Invitation
            </li>
            <li>
                <span class="icon"></span> Where is UTU hosted?
            </li>
            <li>
                <span class="icon"></span> Create Account
            </li>
            <li>
                <span class="icon"></span> Forgot Username Password
            </li>
            <li>
                <span class="icon"></span> Personal settings
            </li>
            <li>
                <span class="icon"></span> Search People/ Group/ DAC
            </li>
            <li>
                <span class="icon"></span> Start a Chat
            </li>
            <li>
                <span class="icon"></span> Create a Group Chat
            </li>
            <li>
                <span class="icon"></span> Group Chat Setting
            </li>
            <li>
                <span class="icon"></span> Community Page
            </li>
            <li>
                <span class="icon"></span> Create DAC
            </li>
            <li>
                <span class="icon"></span> Block a user
            </li>
            <li>
                <span class="icon"></span> Collect your token
            </li>
            <li>
                <span class="icon"></span> Swap your token
            </li>

        </ul>
    </div>
</section>

@endsection

@section('javascript')
    <script src="{{mix('js/index.js')}}"></script>
@endsection
