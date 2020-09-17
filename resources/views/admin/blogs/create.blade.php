@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create a Blog</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/blogs')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" id="title" name="title" required value="{{old('title')}}" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">slug</label>
                                            <input type="text" id="slug" name="slug" required value="{{old('slug')}}" class="form-control">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div>
                                            <label>Picture(recommend: 2400 * 1440)</label>
                                            <input type="file" name="thumbnail" value="{{old('thumbnail')}}"
                                                   class="form-control-file">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Publish Date</label>
                                            <input required type="date"  name="published_at" value="{{old('published_at')}}"
                                                   class="form-control mt-4">
                                        </div>

                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group ">
                                            <label>type</label>
                                            <select required class="form-control" name="type_id">
                                                <option value="" disabled selected>choose ...</option>
                                                @foreach($types as $type)
                                                    <option {{old('type') === $type ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        @foreach($topics as $topic)
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" {{is_array(old('topics')) && in_array($topic->id, old('topics')) ? 'checked' : ''}} name="topics[]" type="checkbox"
                                                           value="{{$topic->id}}">{{$topic->name}}
                                                    <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                                </label>
                                            </div>
                                        @endforeach

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" {{old('is_top') ? 'checked' : ''}} name="is_top" value="1" type="checkbox">
                                                is top?
                                                <span class="form-check-sign">
                                                      <span class="check"></span>
                                                </span>
                                            </label>
                                            <small class="form-text text-muted">only one is in top position</small>
                                            <small class="form-text text-muted">the exited one will be replaced by
                                                new</small>
                                        </div>

                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" {{old('is_active') ? 'checked' : ''}} name="is_active" checked value="1"
                                                       type="checkbox">
                                                is active?
                                                <span class="form-check-sign">
                                                      <span class="check"></span>
                                                </span>
                                            </label>
                                            <small class="form-text text-muted">active blog show to customers</small>
                                            <small class="form-text text-muted">inactive blog hide to customers</small>
                                        </div>

                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea  id="lb_content" name="lb_content" hidden>{{old('lb_content')}}</textarea>
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
    <script src="https://unpkg.com/react@16.8.6/umd/react.production.min.js"></script>

    <script src="https://unpkg.com/react-dom@16.8.6/umd/react-dom.production.min.js"></script>

    <link rel="stylesheet" href="{{asset('vendor/laraberg/css/laraberg.css')}}">

    <script src="{{ asset('vendor/laraberg/js/laraberg.js') }}"></script>
    <script>
        Laraberg.init('lb_content',{
            laravelFilemanager: true,
            height: "500px"
        });
        $('#title').change(function (e) {
            $('#slug').val($(this).val()
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-'));
        });
    </script>
@endsection
