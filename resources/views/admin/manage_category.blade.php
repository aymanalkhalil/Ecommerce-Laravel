@section('title','Manage Category')


@include('admin.includes_admin.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Category
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('manage_category.index')}}">Manage Category</a></li>
            {{-- <li class="active">General Elements</li> --}}
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- right column -->
            <div class="col-md-12">

                @include('admin.includes_admin.alerts.success')
                <!-- general form elements disabled -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        {{-- <h3 class="box-title">General Elements</h3> --}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method='POST' action='{{route('manage_category.store')}}'
                            enctype="multipart/form-data">
                            @csrf
                            <!-- text input -->
                            <div class="form-group {{$errors->has('category_name')? 'has-error' : ''}}">
                                <label> Category Name</label>
                                <input type="text" name='category_name' value="{{old('category_name')}}" class="form-control" placeholder="Enter ...">
                             @error('category_name')
                            <p class="help-block">{{$message}}</p>
                            @enderror
                            </div>

                            <div class="form-group {{$errors->has('category_image')? 'has-error' : ''}} ">
                                <label for="img">Category Image</label>
                                <input type="file" name='category_image' class="form-control">
                                @error('category_image')
                                <p class="help-block text-danger">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class='btn btn-success'>Add Category</button>

                            </div>

                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <section class="content">
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Category Table</h3>

                        <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="Search">

                                <div class="input-group-btn">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            @php
                            $i=1
                            @endphp
                            @foreach ($category as $categories)


                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$categories->category_name}}</td>
                                <td><img src="{{asset('images/category_images/'.$categories->category_image)}}"
                                        width='250px'></td>
                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal"
                                        data-target="#exampleModal{{$i}} ">
                                        Edit
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$i}}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header bg-primary">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                    <button type="button" class="close bg-light" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('manage_category.update', $categories->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" value="{{$categories->id}}">
                                                        <div
                                                            class="form-group {{$errors->has('category_name') ? 'has-error' : ''}}">
                                                            <label>Edit Category Name</label>
                                                            <input type="text" name='category_name'
                                                                value="{{$categories->category_name}}"
                                                                class="form-control" placeholder="Enter ...">
                                                            @error('category_name')
                                                            <p class="help-block">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div
                                                            class="form-group {{$errors->has('category_image')? 'has-error' : ''}} ">
                                                            <label for="exampleInputFile">Edit Category Image</label>
                                                            <input type="file" name='category_image'
                                                                class="form-control">
                                                            @error('category_image')
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Uploaded Image</label>
                                                            <img src="{{asset('images/category_images/'.$categories->category_image)}}"
                                                                width="250px">
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <form action="{{route('manage_category.destroy',$categories->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <td><button type="submit" class='btn btn-danger'>Delete</button></td>
                                </form>

                            </tr>


                            @php
                            $i++;
                            @endphp
                            @endforeach
                        </table>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>

</div>


{{--
<script>
    setTimeout(function() {
$('.alert').fadeOut('fast');
}, 3000);

// $("#edit").submit(function(e) {
// e.preventDefault();
// });
</script> --}}









@include('admin.includes_admin.footer')