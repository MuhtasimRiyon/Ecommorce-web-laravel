@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### Edit marketer ##### -->

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Marketer</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('marketer.update') }}" method="post">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $marketer->id }}">

                            <div class="form-group">
                                <h5>Marketer Name :</h5>
                                <div class="controls">
                                    <input type="text" name="marketer_name" class="form-control" value="{{ $marketer->marketer_name }}">
                                    @error('marketer_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Mobile :</h5>
                                <div class="controls">
                                    <input type="text"  name="mobile" class="form-control" pattern="[0-9]{11}" title="Please input number and 11 character" value="{{ $marketer->mobile }}">
                                    @error('mobile')
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