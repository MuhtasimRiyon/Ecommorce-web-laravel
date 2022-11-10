@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### Edit slider ##### -->

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Info box</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('infobox.update') }}" method="post">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $infobox->id }}">

                            <div class="form-group">
                                <h5>Info box Title :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_title" class="form-control" value="{{ $infobox->infobox_title }}">
                                    @error('infobox_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Info box Title Bangla :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_title_ban" class="form-control" value="{{ $infobox->infobox_title_ban }}">
                                    @error('infobox_title_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Info box Description :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_description" class="form-control" value="{{ $infobox->infobox_description }}">
                                    @error('infobox_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Info box Description Bangla :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_description_ban" class="form-control" value="{{ $infobox->infobox_description_ban }}">
                                    @error('infobox_description_ban')
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