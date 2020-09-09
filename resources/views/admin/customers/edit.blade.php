@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Process Request Access Application</h4>
                    </div>
                    <div class="card-body">
                        <form>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">First Name</label>
                                        <input type="text" disabled value="{{$customer->first_name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" disabled value="{{$customer->last_name}}" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Email</label>
                                        <input type="text" disabled value="{{$customer->email}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Country</label>
                                        <input type="text" disabled value="{{$customer->country}}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Device</label>
                                        <input type="text" disabled value="{{$customer->device}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">IP</label>
                                        <input type="text" disabled value="{{$customer->ip}}" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="mt-5 mb-5">
                                <button type="submit" class="btn btn-primary pull-left">Generate Invited Code</button>
                                <button type="submit" class="btn btn-primary pull-right">Send Invited Code</button>
                            </div>

                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
