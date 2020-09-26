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
                                        file
                                    </th>
                                    <th>
                                        downloads count
                                    </th>
                                    <th>
                                        actions
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($apps as $app)
                                        <tr>
                                            <form id="{{$app->id}}" action="{{url('admin/apps/'.$app->id)}}"  method="post" enctype="multipart/form-data">
                                            <td>
                                                <div class="form-group ">
                                                    <select required class="form-control" name="name">
                                                        <option value="" disabled selected>choose ...</option>
                                                        <option {{$app['name'] === 'android google store' ? 'selected' : ''}} value="android google store">
                                                            android google store
                                                        </option>
                                                        <option {{$app['name'] === 'android beta' ? 'selected' : ''}}  value="android beta">
                                                            android beta
                                                        </option>
                                                        <option {{$app['name'] === 'apple china store' ? 'selected' : ''}}  value="apple china store">
                                                            apple china store
                                                        </option>
                                                        <option {{$app['name'] === 'apple international store' ? 'selected' : ''}}  value="apple international store">
                                                            apple international store
                                                        </option>
                                                        <option {{$app['name'] === 'apple beta' ? 'selected' : ''}}  value="apple beta">
                                                            apple beta
                                                        </option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <input name="id" type="hidden" value="{{$app->id}}">
                                                    <input type="text" name="url" value="{{$app->url}}" class="form-control">
                                                </div>
                                            </td>


                                            <td>
                                                <input type="file" name="file_name" >
                                                @if($app->file_name)
                                                    <a href="{{url('storage/app_downloads/'.$app->file_name)}}">
                                                <span class="material-icons icon-image-preview">cloud_download</span>
                                                    </a>
                                                    <a href="{{url('admin/apps/'.$app->id.'/delete_file')}}" onclick = "if (! confirm('are you sure to delete the software?')) { return false; }">
                                                    <span class="material-icons icon-image-preview">delete</span>
                                                    </a>
                                                @endif
                                            </td>
                                                <td>
                                                    {{$app->downloads_count}}
                                                </td>

                                            <td >

                                                    @csrf
                                                    <input name="_method" type="hidden" value="PUT">
                                                    <input type="submit" class="btn btn-primary" value="update"/>

                                                <button type="button" class="btn btn-primary"  onclick="deleteApp('delete_form_{{$app->id}}')">
                                                    delete
                                                </button>
                                            </td>
                                            </form>
                                            <form id="delete_form_{{$app->id}}" action="{{ url('admin/apps/'.$app->id) }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                <input name="_method" type="hidden" value="DELETE">
                                                @csrf
                                            </form>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <form id="0" action="{{url('admin/apps/')}}"  method="post" enctype="multipart/form-data">
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
                                            <input type="file" name="file_name">
                                        </td>
                                        <td>

                                                @csrf
                                                <input type="submit" name="0" class="btn btn-primary " value="add" />
                                        </td>
                                        </form>
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

<script>
    function deleteApp(formId) {
        if(window.confirm('are you sure to delete it?')) {
            document.getElementById(formId).submit();
        }
    }
</script>
