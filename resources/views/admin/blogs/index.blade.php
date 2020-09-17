@extends('layouts.admin')

@section('content')


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Blog List</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead class=" text-primary">
                                    <th>
                                        title
                                    </th>
                                    <th>
                                       publish date
                                    </th>
                                    <th>
                                        state
                                    </th>
                                    <th>
                                        type
                                    </th>
                                    <th>
                                        topics
                                    </th>
                                    <th>
                                        action
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr>
                                            <td>
                                                {{Str::words($blog->title),4,'...'}}
                                            </td>
                                            <td>
                                                {{$blog->published_at}}
                                            </td>
                                            <td>
                                                {{$blog->getStatus()}}
                                            </td>
                                            <td>
                                                {{$blog->type->name}}
                                            </td>
                                            <td >
                                                {{$blog->topics->implode('name',',')}}
                                            </td>
                                            <td >

                                            </td>
                                            <td >

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
