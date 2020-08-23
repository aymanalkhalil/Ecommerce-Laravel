@section('title','Manage Products')

@include('admin.includes_admin.header')


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Manage Products
            <small>Preview</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('manage_products.index')}}">Manage Products</a></li>
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
                <div class="box box-danger">
                    <div class="box-header with-border">
                        {{-- <h3 class="box-title">General Elements</h3> --}}
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form" method="POST" action='{{route('manage_products.store')}}'
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{$errors->has('cat_id') ? 'has-error' : ''}} ">
                                <label>Choose Product Category</label>
                                <select class="form-control" name='cat_id'>
                                    <option disabled selected>Choose Category </option>
                                    @foreach ($category as $categories)
                                    <option value='{{$categories->id}}'>{{$categories->category_name}}</option>
                                    @endforeach
                                </select>
                                @error('cat_id')
                                <p class="help-block">{{$message}}</p>
                                @enderror
                            </div>
                            <!-- text input -->
                            <div class="form-group {{$errors->has('prod_name')? 'has-error' : ''}}">
                                <label> Product Name</label>
                                <input type="text" name='prod_name' value="{{old('prod_name')}}" class="form-control"
                                    placeholder="Enter ...">
                                @error('prod_name')
                                <p class="help-block">{{$message}}</p>
                                @enderror
                            </div>

                            <!-- textarea -->
                            <div class="form-group {{$errors->has('prod_desc')? 'has-error' : ''}}">
                                <label>Product Description</label>
                                <textarea class="form-control" name='prod_desc' value="{{old('prod_desc')}}" rows="3"
                                    placeholder="Enter ..."></textarea>
                                @error('prod_desc')
                                <p class="help-block">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group {{$errors->has('prod_price')? 'has-error' : ''}}">
                                <label> Product Price</label>
                                <input type="text" name='prod_price' value="{{old('prod_price')}}" class="form-control"
                                    placeholder="Enter ...">
                                @error('prod_price')
                                <p class="help-block">{{$message}}</p>
                                @enderror
                            </div>
                            <div class="form-group {{$errors->has('prod_image')? 'has-error' : ''}} ">
                                <label for="">Product Image</label>
                                <input type="file" name='prod_image' class="form-control" id="">
                                @error('prod_image')
                                <p class="help-block">{{$message}}</p>
                                @enderror

                                {{-- <p class="help-block">Example block-level help text here.</p> --}}
                            </div>

                            <div class="form-group">
                                <button type="submit" class='btn btn-info col-xs-12 '>Add Product</button>

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
                <div class="box box-danger">

                    <div class="box-header">
                        <h3 class="box-title">Products Table</h3>

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
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <th>Product Description</th>
                                <th>Product Price</th>
                                <th>Product Image</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>

                            @php
                            $i=1
                            @endphp
                            {{-- @if (isset($product && $product->count()>0)) --}}


                            @foreach ($product as $products)


                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$products->prod_name}}</td>
                                <td>{{$products->category_name}}</td>
                                <td>{{$products->prod_desc}}</td>
                                <td>{{$products->prod_price}}</td>
                                <td><img src="{{asset('images/product_images/'.$products->prod_image)}}" width='150px'>
                                </td>
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
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                    <button type="button" class="close bg-light" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('manage_products.update', $products->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="id" value="{{$products->id}}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Choose Product Category</label>
                                                            <select class="form-control" name='cat_id'>
                                                                <option disabled selected>Choose Category </option>
                                                                @foreach ($category as $categories)
                                                                @if ($categories->id==$products->category_id)
                                                                <option value="{{$categories->id}}" selected>
                                                                    {{$categories->category_name}}</option>
                                                                @else
                                                                <option value="{{$categories->id}}">
                                                                    {{$categories->category_name}}</option>
                                                                @endif
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div
                                                            class="form-group {{$errors->has('prod_name')? 'has-error' : ''}}">
                                                            <label>Edit Product Name</label>
                                                            <input type="text" name='prod_name'
                                                                value="{{$products->prod_name}}" class="form-control"
                                                                placeholder="Enter ...">
                                                            @error('prod_name')
                                                            <p class="help-block">{{$message}}</p>
                                                            @enderror

                                                        </div>
                                                        <div
                                                            class="form-group {{$errors->has('prod_desc')? 'has-error' : ''}}">
                                                            <label>Edit Product Description</label>
                                                            <textarea class="form-control" name='prod_desc' rows='7'
                                                                placeholder="Enter ...">{{$products->prod_desc}}</textarea>
                                                            @error('prod_desc')
                                                            <p class="help-block">{{$message}}</p>
                                                            @enderror
                                                        </div>

                                                        <div
                                                            class="form-group {{$errors->has('prod_price')? 'has-error' : ''}}">
                                                            <label> Product Price</label>
                                                            <input type="text" name='prod_price'
                                                                value="{{$products->prod_price}}" class="form-control"
                                                                placeholder="Enter ...">
                                                            @error('prod_price')
                                                            <p class="help-block">{{$message}}</p>
                                                            @enderror

                                                        </div>
                                                        <div
                                                            class="form-group {{$errors->has('prod_image')? 'has-error' : ''}} ">
                                                            <label for="exampleInputFile">Edit Product Image</label>
                                                            <input type="file" name='prod_image' class="form-control">
                                                            @error('prod_image')
                                                            <p class="help-block text-danger">{{$message}}</p>
                                                            @enderror

                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputFile">Uploaded Image</label>
                                                            <img src="{{asset('images/product_images/'.$products->prod_image)}}"
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
                                <form action="{{route('manage_products.destroy',$products->id)}}" method="post">
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
                        <div class="col-md-6">
                            {{ $product->links() }}
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
    </section>
</div>


@include('admin.includes_admin.footer')
{{-- <script>
    $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> --}}
