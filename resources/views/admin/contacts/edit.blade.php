@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Process Request Access Application</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/contacts/'.$contact->id.'/reply')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">First Name</label>
                                            <input type="text" disabled value="{{$contact->first_name}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Last Name</label>
                                            <input type="text" disabled value="{{$contact->last_name}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Email</label>
                                            <input type="text" disabled value="{{$contact->email}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Country</label>
                                            <input type="text" disabled value="{{$contact->country}}" class="form-control">
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Question</label>
                                        <div class="form-group bmd-form-group">
                                            <textarea class="form-control" disabled rows="5">{{$contact->question}}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Answer</label>
                                        <div class="form-group bmd-form-group" >
                                            <textarea class="form-control" name="answer" rows="5">{{old('answer') ?? $contact->answer}}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5 mb-5">
                                    @include('layouts.message')
                                    <button type="submit" class="btn btn-primary pull-right">Answer & Send Reply Email</button>
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
