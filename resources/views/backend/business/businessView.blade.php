@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### add Business ##### -->

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Business</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('business.store') }}" method="post">
                            
                            @csrf

                            <div class="form-group">
                                <h5>Business Name :</h5>
                                <div class="controls">
                                    <input type="text"  name="business_name" class="form-control">
                                    @error('business_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- ### Submit button ### -->

                            <div class="text-xs-right">
                                <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Save">
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