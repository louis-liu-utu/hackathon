@extends('layouts.mail')

@section('content')
    <div class="request">
        <h3>
            Dear {{$first_name}}
        </h3>
       <br>
        <p class="primary-txt">
            {{$answer}}
        </p>
    </div>
@endsection


