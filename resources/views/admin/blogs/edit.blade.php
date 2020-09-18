@extends('layouts.admin')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create News</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/blogs/'.$blog->id)}}" id="admin_blogs" method="post"  enctype="multipart/form-data">
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <input type="hidden" name="id" value="{{$blog->id}}">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" id="title" name="title" required value="{{$blog->title}}" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group bmd-form-group">
                                                    <label class="bmd-label-floating">slug</label>
                                                    <input type="text" id="slug" name="slug" required value="{{$blog->slug}}" class="form-control">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label>Publish Date</label>
                                                    <input required type="date"  name="published_at" value="{{$blog->published_at}}"
                                                           class="form-control mt-4">
                                                </div>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group ">
                                                            <label>type</label>
                                                            <select required class="form-control" name="type_id">
                                                                @foreach($types as $type)
                                                                    <option {{$blog->type === $type ? 'selected' : ''}} value="{{$type->id}}">{{$type->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" {{$blog->is_active ? 'checked' : ''}} name="is_active" checked value="1"
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
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-sm-6">
                                        <div>
                                            <label>Picture(recommend: 2400 * 1440)</label>
                                            <input type="file" name="thumbnail"
                                                   class="form-control-file">
                                        </div>

                                        <img width="100%" id="thumbnail-show" src="{{$blog->getThumbnailUrl()}}" alt="">
                                    </div>

                                </div>

                                <div class="row">
{{--
                                    <div class="col-sm-6">
                                        @foreach($topics as $topic)
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" {{is_array($blog->topics) && in_array($topic->id, $blog->topics) ? 'checked' : ''}} name="topics[]" type="checkbox"
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
                                                <input class="form-check-input" {{$blog->is_top ? 'checked' : ''}} name="is_top" value="1" type="checkbox">
                                                is top?
                                                <span class="form-check-sign">
                                                      <span class="check"></span>
                                                </span>
                                            </label>
                                            <small class="form-text text-muted">only one is in top position</small>
                                            <small class="form-text text-muted">the exited one will be replaced by
                                                new</small>
                                        </div>

                                    </div>--}}


                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <textarea  id="lb_content" name="lb_content" hidden>{!! $blog->lb_content !!}</textarea>
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
        $('#title').change(function (e) {
            $('#slug').val($(this).val()
                .toLowerCase()
                .replace(/[^\w ]+/g,'')
                .replace(/ +/g,'-'));
        });

        $('input[name="thumbnail"]').change(function () {
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#thumbnail-show').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            } else {
                alert('select a file to see preview');
                $('#thumbnail-show').attr('src', '');
            }
        });

    </script>
@endsection
