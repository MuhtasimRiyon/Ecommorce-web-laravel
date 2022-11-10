@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Slider list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Slider Image</th>
                                <th>Slider Title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($slider as $value)
                                    <tr>
                                        <td><img src="{{ asset($value->slider_img) }}" style="width:100px; height:80px"></td>
                                        <td>
                                            @if($value->title == Null)
                                            <span class="badge badge-pill badge-info"><strong>No Title</strong></span>
                                            @else
                                            {{ $value->title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->description == Null)
                                            <span class="badge badge-pill badge-info"><strong>No Description</strong></span>
                                            @else
                                            {{ $value->description }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->status == 1)
                                            <span class="badge badge-pill badge-success"><strong>Active</strong></span>
                                            @else
                                            <span class="badge badge-pill badge-danger"><strong>Inactive</strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <a href="{{ route('slider.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                            <!-- ########## slider status ########### -->
                                            @if($value->status == 1)
                                            <a href="{{ route('slider.inactive',$value->id) }}" class="btn btn-dark" title="inactive now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('slider.active',$value->id) }}" class="btn btn-success" title="active now"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            <!-- ########## end slider status ########### -->
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

        <!-- #### add slider ##### -->

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Slider</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('slider.store') }}" method="post"  enctype="multipart/form-data">
                            
                            @csrf

                            <div class="form-group">
                                <h5>Slider Title :</h5>
                                <div class="controls">
                                    <input type="text"  name="title" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Description :</h5>
                                <div class="controls">
                                    <input type="text"  name="description" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Slider Image:</h5>
                                <div class="controls">
                                    <input type="file"  name="slider_img" class="form-control">
                                    @error('slider_img')
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