@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### Edit slider ##### -->

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit slider</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('slider.update') }}" method="post"  enctype="multipart/form-data">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $slider->id }}">
                            <input type="hidden" name="old_img" value="{{ $slider->slider_img }}">

                            <div class="form-group">
                                <h5>Slider Title:</h5>
                                <div class="controls">
                                    <input type="text"  name="title" class="form-control" value="{{ $slider->title }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Description :</h5>
                                <div class="controls">
                                    <input type="text"  name="description" class="form-control" value="{{ $slider->description }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Brand Image:</h5>
                                <div class="controls">
                                    <input type="file"  name="slider_img" class="form-control">
                                    @error('slider_img')
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