@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### add category ##### -->

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('category.update',$category->id) }}" method="post">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $category->id }}">
                            {{-- <input type="hidden" name="old_img" value="{{ $brand->brand_image }}"> --}}

                            <div class="form-group">
                                <h5>Category Name English:</h5>
                                <div class="controls">
                                    <input type="text"  name="category_name_en" class="form-control" value="{{ $category->category_name_en }}">
                                    @error('category_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Category Name Bangla:</h5>
                                <div class="controls">
                                    <input type="text"  name="category_name_ban" class="form-control" value="{{ $category->category_name_ban }}">
                                    @error('category_name_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>category Icon:</h5>
                                <div class="controls">
                                    <input type="text"  name="category_icon" class="form-control" value="{{ $category->category_icon }}">
                                    @error('category_icon')
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