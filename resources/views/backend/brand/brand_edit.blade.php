@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### add brand ##### -->

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Brand</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('brand.update',$brand->id) }}" method="post"  enctype="multipart/form-data">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $brand->id }}">
                            <input type="hidden" name="old_img" value="{{ $brand->brand_image }}">

                            <div class="form-group">
                                <h5>Brand Name English:</h5>
                                <div class="controls">
                                    <input type="text"  name="brand_name_en" class="form-control" value="{{ $brand->brand_name_en }}">
                                    @error('brand_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Name Bangla:</h5>
                                <div class="controls">
                                    <input type="text"  name="brand_name_ban" class="form-control" value="{{ $brand->brand_name_ban }}">
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
                                <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
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