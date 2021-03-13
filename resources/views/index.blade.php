@extends('layouts.app')

@section('title', 'redefine social platform | blockchain token | real people only | benefit members')

@section('description', 'UTU is a social platform built on blockchain, for real people only and benefit members')

@section('style')
    <link rel="stylesheet" href="{{url('css/index.css')}}">
@endsection
@section('content')

<section class="home1">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="title"></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <p class="content">
                    Quisque id odio. Nullam nulla eros, ultricies sit amet, nonummy id, imperdiet feugiat, pede. Praesent porttitor, nulla vitae posuere iaculis, arcu nisl dignissim dolor, a pretium mi sem ut ipsum. Praesent turpis. Donec venenatis vulputate lorem.

                    Aenean ut eros et nisl sagittis vestibulum. Phasellus ullamcorper ipsum rutrum nunc. Vivamus aliquet elit ac nisl. Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia.

                    Pellentesque auctor neque nec urna. Praesent adipiscing. Suspendisse enim turpis, dictum sed, iaculis a, condimentum nec, nisi. Nulla facilisi. Phasellus leo dolor, tempus non, auctor et, hendrerit quis, nisi.
                </p>

            </div>
            <div class="col-sm-6">
                <p class="content">
                    Vestibulum facilisis purus nec pulvinar
                </p>
            </div>
        </div>
    </div>
</section>

@endsection

@section('javascript')
    <script src="{{url('js/index.js')}}"></script>
@endsection
