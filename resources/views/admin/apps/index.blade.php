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
                            <h4 class="card-title ">App List</h4>
                        </div>
                        <div class="card-body">
                            @include('layouts.message')
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead class=" text-primary">
                                    <th>
                                        name
                                    </th>
                                    <th>
                                        url
                                    </th>
                                    <th>
                                        thumb
                                    </th>
                                    <th>
                                        file
                                    </th>
                                    <th>
                                        actions
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($apps as $app)
                                        <tr>
                                            <td>
                                                <div class="form-group ">
                                                    <select required class="form-control" name="name">
                                                        <option value="" disabled selected>choose ...</option>
                                                        <option {{$app->name === 'android google store' ? 'selected' : ''}} value="android google store">
                                                            android google store
                                                        </option>
                                                        <option {{$app->name === 'android beta' ? 'selected' : ''}}  value="android beta">
                                                            android beta
                                                        </option>
                                                        <option {{$app->name === 'apple china store' ? 'selected' : ''}}  value="apple china store">
                                                            apple china store
                                                        </option>
                                                        <option {{$app->name === 'apple international store' ? 'selected' : ''}}  value="apple international store">
                                                            apple international store
                                                        </option>
                                                        <option {{$app->name === 'apple beta' ? 'selected' : ''}}  value="apple beta">
                                                            apple beta
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="text" name="url" value="{{$app->url}}" class="form-control">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input type="file" name="thumb" class="form-control">
                                                    <img src="" alt="">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="form-group">
                                                    <input type="file" name="file_name" class="form-control">

                                                </div>
                                            </td>

                                            <td >
                                                <form action="{{url('admin/apps/'.$app->id)}}"  method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <button class="custom-button btn-edit" >
                                                        <span class="material-icons icon-image-preview">Edit</span>
                                                    </button>
                                                </form>

                                                <form action="{{url('admin/apps/'.$app->id)}}"  method="post">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button class="custom-button btn-del" >
                                                        <span class="material-icons icon-image-preview">delete</span>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td>
                                            <div class="form-group ">
                                                <select required class="form-control" name="name">
                                                    <option value="" disabled selected>choose ...</option>
                                                    <option {{old('name') === 'android google store' ? 'selected' : ''}} value="android google store">
                                                        android google store
                                                    </option>
                                                    <option {{old('name') === 'android beta' ? 'selected' : ''}}  value="android beta">
                                                        android beta
                                                    </option>
                                                    <option {{old('name') === 'apple china store' ? 'selected' : ''}}  value="apple china store">
                                                        apple china store
                                                    </option>
                                                    <option {{old('name') === 'apple international store' ? 'selected' : ''}}  value="apple international store">
                                                        apple international store
                                                    </option>
                                                    <option {{old('name') === 'apple beta' ? 'selected' : ''}}  value="apple beta">
                                                        apple beta
                                                    </option>
                                                </select>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-group">
                                                <input type="text" name="url" value="{{old('url')}}" class="form-control">
                                            </div>
                                        </td>
                                        <td>
                                            <input type="file" name="thumb" >
                                        </td>
                                        <td>
                                            <input type="file" name="file_name">
                                        </td>
                                        <td>
                                            <form action="{{url('admin/apps/')}}"  method="post">
                                                @csrf
                                                <button class="custom-button btn-edit" >
                                                    <span class="material-icons icon-image-preview">create_new_folder</span>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
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
