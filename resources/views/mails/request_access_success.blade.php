@extends('layouts.mail')

@section('content')
    <style>
        .request {
            max-width: 650px;
            margin: 200px auto 100px;
        }
        .request .title {
            font-weight: 500;
            text-align: left;
        }
        .request .primary-txt{
            font-size: 26px;
            opacity: .6;
        }
    </style>
<div class="request">
    <h1 class="title">
        Thank You for Requesting Beta Access!
    </h1>
    <p class="primary-txt">You've taken the first step to getting started on UTU.<br>
        Stay tuned for more information. In the meanwhile,<br>
        please take time to visit our official website
    </p>
</div>
@endsection






