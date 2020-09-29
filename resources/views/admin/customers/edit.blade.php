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

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">First Name</label>
                                        <input type="text" disabled value="{{$customer->first_name}}"
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group bmd-form-group">
                                        <label class="bmd-label-floating">Last Name</label>
                                        <input type="text" disabled value="{{$customer->last_name}}"
                                               class="form-control">
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

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class=" text-primary">
                                                    <th>
                                                        invited code
                                                    </th>
                                                    <th>
                                                        status
                                                    </th>
                                                    <th>
                                                        created time
                                                    </th>
                                                    <th>
                                                        send time
                                                    </th>
                                                    <th>
                                                        expired time
                                                    </th>

                                                    </thead>
                                                    <tbody>

                                                    @forelse($customer->invitedCodes as $invitedCode)
                                                        <tr>
                                                            <td>
                                                                {{$invitedCode->code}}
                                                            </td>
                                                            <td class="{{$invitedCode->getStatus()}}">
                                                                {{$invitedCode->getStatus()}}
                                                            </td>
                                                            <td>
                                                                {{$invitedCode->created_at}}
                                                            </td>
                                                            <td>
                                                                {{$invitedCode->sent_at}}
                                                            </td>
                                                            <td>
                                                                {{$invitedCode->expired_by}}
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5"> No data</td>
                                                        </tr>
                                                    @endforelse
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <h2>{{session('generatedInvitedCode.code') ?? ''}}</h2>
                                    @if(Session::has('result'))
                                        @if(session('result.status') != 1)
                                            <div class="alert alert-danger">
                                                {{session('result.msg')}}
                                            </div>
                                        @else
                                            <div class="alert alert-success">
                                                {{session('result.msg')}}
                                            </div>
                                        @endif
                                    @endif
                                </div>
                            </div>

                            <div class="mt-5 mb-5">
                                <form action="{{url('admin/customers/'.$customer->id.'/generate_code')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="action" value="generate">
                                    <button type="submit" class="btn btn-primary pull-left">Generate Invited Code
                                    </button>
                                </form>
                                <form id="send_code_form"
                                      action="{{url('admin/customers/'.$customer->id.'/send_code')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="action" value="send">
                                    <button id="send_code" type="button" data-toggle="modal" data-target="#confirm-send"
                                            class="btn btn-primary pull-right">Send Invited Code
                                    </button>
                                </form>
                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="confirm-send" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Confirm Send Email</h4>
                </div>
                <div class="modal-body">
                    <p id="send-code-msg"></p>
                    <p>Do you want to proceed?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" id="send_invited_code" class="btn btn-danger btn-ok">Send Invited Code
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('javascript')
    <script>
        const send_code = document.querySelector('#send_code');
        send_code.addEventListener('click', function (event) {
            event.preventDefault();
            const sendCodeMsg = document.querySelector('#send-code-msg');
            let msg = "<div class='alert alert-success'>You are going to send invited code to the customer</div>";
            const sent = document.querySelector('.sent');
            const verified = document.querySelector('.verified');

            if (verified || sent) {
                msg = "<div class='alert alert-danger'>the customer's invited code  have already been verified or sent.<div>";
            }


            sendCodeMsg.innerHTML = msg;
        });

        const sendInvitedCode = document.querySelector('#send_invited_code');
        sendInvitedCode.addEventListener('click', function (event) {
            event.preventDefault();
            const sendCodeForm = document.querySelector('#send_code_form');
            sendCodeForm.submit();
        });
    </script>
@endsection
