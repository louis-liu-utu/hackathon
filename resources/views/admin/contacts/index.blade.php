@extends('layouts.admin')

@section('content')
    <style>
        .btn-primary {
            color: #fff !important;
        }
        .custom-button {
            border: none;
            background: #fff;
            float: right;
        }
        .material-icons {
            cursor: pointer;
        }
    </style>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Request Access Applications</h4>
                        </div>
                        <div class="card-body">
                            @include('layouts.message')
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
                                        question
                                    </th>
                                    <th>
                                        Create Time
                                    </th>
                                    <th>
                                        Process
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $contact)
                                        <tr>
                                            <td>
                                                {{$contact->id}}
                                            </td>
                                            <td>
                                                {{$contact->getFullName()}}
                                            </td>
                                            <td>
                                                {{$contact->email}}
                                            </td>
                                            <td>
                                                {{$contact->country}}
                                            </td>
                                            <td >
                                                {{$contact->question}}
                                            </td>
                                            <td >
                                                {{$contact->created_at}}
                                            </td>
                                            <td >


                                                <form action="{{url('admin/contacts/'.$contact->id)}}"  method="post">
                                                    <a href="{{url('admin/contacts/'.$contact->id)}}">
                                                        <icons-image _ngcontent-mes-c22="" _nghost-mes-c19=""><span _ngcontent-mes-c19="" class="material-icons icon-image-preview">edit</span></icons-image>
                                                    </a>
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="custom-button btn-del" >
                                                        <span class="material-icons icon-image-preview">delete</span>
                                                    </button>
                                                </form>
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

@section('javascript')
<script>
    $('.btn-del').click(function (e) {
        e.preventDefault();
        if(window.confirm('are you sure to delete it?')) {
            $(this).parents('form').submit();
        }
    });
</script>
@endsection
