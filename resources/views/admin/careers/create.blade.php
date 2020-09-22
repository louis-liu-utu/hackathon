@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Position</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/careers')}}" method="post" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text"  name="title" required value="{{old('title')}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Location</label>
                                            <input type="text"  name="location" required value="{{old('location')}}" class="form-control">
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea  id="lb_content" name="lb_content" hidden>{!! old('lb_content') !!}</textarea>
                                    </div>

                                </div>
                                <div class="mt-5 mb-5">
                                    @include('layouts.message')
                                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                                </div>

                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <style>
        .row {
            margin-top: 30px;
        }
    </style>
    <script src="{{url('vendor/laraberg/js/react.production.min.js')}}"></script>

    <script src="{{url('vendor/laraberg/js/react-dom.production.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">

    <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
    <script>
        Laraberg.init('lb_content',{
            laravelFilemanager: true,
            height: "500px"
        });
    </script>
@endsection
