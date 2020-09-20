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
                            <h4 class="card-title ">News List</h4>
                        </div>
                        <div class="card-body">
                            <span>default sort is create time, but the table row can be dragged to re-sort the news</span>
                            @include('layouts.message')

                            <a href="{{url('admin/blogs/create')}}" class="btn btn-primary pull-right">Create News</a>
                            <button  type="button" data-toggle="modal" data-target="#blog-types" class="btn btn-primary pull-right">Manage Types</button>
                            <div class="table-responsive">
                                <table class="table" id="blog-list">
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
                                        thumbnail
                                    </th>
                                    <th>
                                       actions
                                    </th>
                                    </thead>
                                    <tbody>
                                    @foreach($blogs as $blog)
                                        <tr data-id="{{$blog->id}}">
                                            <td>
                                                {{Str::words($blog->title,6,'...')}}
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
{{--                                                {{$blog->topics->implode('name',',')}}--}}
                                                <img height="80" src="{{$blog->getThumbnailUrl()}}" alt="">
                                            </td>

                                            <td >

                                                <form action="{{url('admin/blogs/'.$blog->id)}}"  method="post">
                                                    <a href="{{url('admin/blogs/'.$blog->id.'/edit')}}">
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


    <div class="modal fade" id="blog-types" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Blog Types</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table" id="type-table">
                        <th>
                            id
                        </th>
                        <th>
                            name
                        </th>
                        <th>
                            actions
                        </th>
                        @foreach($types as $type)
                        <tr>
                            <td>{{$type->id}}</td>
                            <td><input type="text"  id="type-{{$type->id}}" value="{{$type->name}}"> </td>
                            <td>
                                <span onclick="updateType('{{$type->id}}')" class="material-icons icon-image-preview">edit</span>
                                <span  onclick="deleteType('{{$type->id}}', '{{$type->blogs_count}}')"  class="material-icons icon-image-preview">delete</span>
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                            <td class="typeId"></td>
                            <td><input type="text" ></td>
                            <td>  <button onclick="addType(this)" type="button" class="btn btn-danger btn-ok">Add Type
                                </button>
                            </td>
                        </tr>
                    </table>
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


        $(document).ready( function () {
            var dragSrc = null;  //Globally track source cell
            var cells = null;  // All cells in table

            var table = $('#blog-list').DataTable({
                ordering: false,
                pageLength: 50,
                columnDefs: [{
                    targets: '_all',

                    // Set HTML5 draggable for all cells
                    createdCell: function (td, cellData, rowData, row, col) {
                        $(td).attr('draggable', 'true');
                    }
                }],
                drawCallback: function () {
                    // Apply HTML5 drag and drop listeners to all cells
                    cells = document.querySelectorAll('#blog-list tr');
                    [].forEach.call(cells, function (cell) {
                        cell.addEventListener('dragstart', handleDragStart, false);
                        cell.addEventListener('dragenter', handleDragEnter, false)
                        cell.addEventListener('dragover', handleDragOver, false);
                        cell.addEventListener('dragleave', handleDragLeave, false);
                        cell.addEventListener('drop', handleDrop, false);
                        cell.addEventListener('dragend', handleDragEnd, false);
                    });
                }
            });


            function handleDragStart(e) {
                this.style.cssText = "color:#000;font-weight:400";  // this / e.target is the source node.
                dragSrc = this;  // Keep track of source cell

                // Allow moves
                e.dataTransfer.effectAllowed = 'move';

                // Get the cell data and store in the transfer data object
                e.dataTransfer.setData('text/html', this.innerHTML);
            }

            function handleDragOver(e) {
                if (e.preventDefault) {
                    e.preventDefault(); // Necessary. Allows us to drop.
                }

                // Allow moves
                e.dataTransfer.dropEffect = 'move';  // See the section on the DataTransfer object.

                return false;
            }

            function handleDragEnter(e) {
                // this / e.target is the current hover target.

                // Apply drop zone visual
                this.classList.add('over');
            }

            function handleDragLeave(e) {
                // this / e.target is previous target element.

                // Remove drop zone visual
                this.classList.remove('over');
            }

            function handleDrop(e) {
                // this / e.target is current target element.
                if (e.stopPropagation) {
                    e.stopPropagation(); // stops the browser from redirecting.
                }

                // Don't do anything if dropping the same column we're dragging.
                if (dragSrc != this) {
                    // Set the source column's HTML to the HTML of the column we dropped on.
                    dragSrc.innerHTML = this.innerHTML;

                    // Set the distination cell to the transfer data from the source
                    this.innerHTML = e.dataTransfer.getData('text/html');

                    // Invalidate the src cell and dst cell to have DT update its cache then draw
                    table.cell(dragSrc).invalidate();
                    table.cell(this).invalidate().draw(false);

                    $.get( '{{url("admin/blogs-sort?source=")}}' + $(dragSrc).data('id') + '&dest=' + $(this).data('id'), function( data ) {
                    });
                }

                return false;
            }

            function handleDragEnd(e) {
                // this/e.target is the source node.
                this.style.opacity = "1.0";
                [].forEach.call(cells, function (cell) {
                    // Make sure to remove drop zone visual class
                    cell.classList.remove('over');
                });
            }


        });

        function updateType(typeId) {
            var name = $("#type-"+typeId).val();
            if(name.trim() != "") {
                $.get('{{url("/")}}' + '/admin/blogs-types/' + typeId + '/update?name=' + name, function( data ) {
                    alert('update successfully');
                });
            } else {
                alert('type name is required');
            }
        }

        function deleteType(typeId, blogs_count) {
            if(blogs_count != 0) {
                alert('please move the news that under this type first.');
                return;
            }
            if(window.confirm("are you sure to delete it?")) {
                $.get('{{url("/")}}' + '/admin/blogs-types/' + typeId + '/delete', function( data ) {
                    $("#type-"+typeId).parent().parent().remove();
                });
            }
        }

        function addType(me) {
            var parent = $(me).parent().parent();
            var name = parent.find('input').val();
            if(name.trim() != "") {
                $.get('{{url("/")}}' + '/admin/blogs-types/add?name='+name, function( data ) {
                    $(parent).find('.typeId').text(data.id);
                    $(parent).find('input').attr('id','type-' + data.id);
                    var td = $(me).parent();
                    $(td).html('<span onclick="updateType(' + data.id + ')" class="material-icons icon-image-preview">edit</span>' +
                        '                                <span  onclick="deleteType(' + data.id + ',0)"  class="material-icons icon-image-preview">delete</span>');
                    $('#type-table').append('<tr>' +
                        '                            <td class="typeId"></td>' +
                        '                            <td><input type="text" ></td>' +
                        '                            <td>  <button onclick="addType(this)" type="button" class="btn btn-danger btn-ok">Add Type' +
                        '                                </button>' +
                        '                            </td>' +
                        '                        </tr>');
                });
            }else {
                alert('type name is required');
            }

        }

    </script>
@endsection
