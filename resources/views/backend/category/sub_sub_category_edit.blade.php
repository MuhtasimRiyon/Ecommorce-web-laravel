@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### add category ##### -->

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Sub->Sub category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('subsubcategory.update') }}" method="post">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $subsubcategory->id }}">

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="disabled">Select Category</option>
                                        @foreach($category as $value)
										<option value="{{$value->id}}"{{ $value->id == $subsubcategory->category_id ? 'selected' : '' }}>{{ $value->category_name_en}}</option>
                                        @endforeach
									</select>
                                    @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
							</div>

                            <br>

                            <div class="form-group">
								<h5>Sub Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="subcategory_id" class="form-control">
										<option value="" selected="disabled">Select Sub Category</option>
                                        @foreach($subcategory as $value)
										<option value="{{$value->id}}"{{ $value->id == $subsubcategory->subcategory_id ? 'selected' : '' }}>{{ $value->subcategory_name_en}}</option>
                                        @endforeach
									</select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
							</div>

                            <br>

                            <div class="form-group">
                                <h5>Sub->Sub Category Name English:</h5>
                                <div class="controls">
                                    <input type="text"  name="subsubcategory_name_en" class="form-control" value="{{ $subsubcategory->subsubcategory_name_en }}">
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub->Sub Category Name Bangla:</h5>
                                <div class="controls">
                                    <input type="text"  name="subsubcategory_name_ban" class="form-control" value="{{ $subsubcategory->subsubcategory_name_ban }}">
                                    @error('subsubcategory_name_ban')
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