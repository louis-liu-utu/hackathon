@extends('layouts.admin')

@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Request Access Applications</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead class=" text-primary">
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        email
                                    </th>
                                    <th>
                                        Country
                                    </th>
                                    <th>
                                        Device
                                    </th>
                                    <th>
                                        Create Time
                                    </th>
                                    <th>
                                        InvitedCode State
                                    </th>
                                    <th>
                                        Process
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>
                                                {{$customer->id}}
                                            </td>
                                            <td>
                                                {{$customer->getFullName()}}
                                            </td>
                                            <td>
                                                {{$customer->email}}
                                            </td>
                                            <td>
                                                {{$customer->country}}
                                            </td>
                                            <td >
                                                {{$customer->device}}
                                            </td>
                                            <td >
                                                {{$customer->created_at}}
                                            </td>
                                            <td>
                                                {{$customer->getInvitedStatus()}}
                                            </td>
                                            <td >
                                                <a href="{{url('admin/customers/'.$customer->id)}}">
                                                    <icons-image _ngcontent-mes-c22="" _nghost-mes-c19=""><span _ngcontent-mes-c19="" class="material-icons icon-image-preview">edit</span></icons-image>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
