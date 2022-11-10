@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Brand list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Brand Name English</th>
                                <th>Brand Name Bangla</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($brands as $value)
                                    <tr>
                                        <td>{{ $value->brand_name_en }}</td>
                                        <td>{{ $value->brand_name_ban }}</td>
                                        <td><img src="{{ asset($value->brand_image) }}" style="width:100px; height:80px"></td>
                                        <td>
                                            <a href="{{ route('brand.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <a href="{{ route('brand.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->          
        </div>
        <!-- /.col -->

        <!-- #### add brand ##### -->

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('brand.store') }}" method="post"  enctype="multipart/form-data">
                            
                            @csrf

                            <div class="form-group">
                                <h5>Brand Name English:</h5>
                                <div class="controls">
                                    <input type="text"  name="brand_name_en" class="form-control">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Name Bangla:</h5>
                                <div class="controls">
                                    <input type="text"  name="brand_name_ban" class="form-control">
                                    @error('brand_name_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Image:</h5>
                                <div class="controls">
                                    <input type="file"  name="brand_image" class="form-control">
                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- ### Submit button ### -->

                            <div class="text-xs-right">
                                <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add">
                            </div>

                        </form>

					</div>
				<!-- /.col -->
			  </div></form>
			  <!-- /.row -->
			</div>
			<!-- /.box-body -->
		  </div>
		  <!-- /.box -->

		</div></div>

                    </div>
                </div>
            <!-- /.box-body -->
            </div>
            <!-- /.box -->          
        </div>
        <!-- /.col -->


    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
    
@endsection