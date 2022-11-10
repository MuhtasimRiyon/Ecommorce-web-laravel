@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Info box list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <!-- <th>SL</th> -->
                                <th>Info box Title</th>
                                <th>Info box Title Bangla</th>
                                <th>Info box Description</th>
                                <th>Info box Description Bangla</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($infobox as $key=>$value)
                                    <tr>
                                        <!-- <td>{{ $key+1 }}</td> -->
                                        <td>
                                            @if($value->infobox_title == Null)
                                            <span class="badge badge-pill badge-info"><strong>No Title</strong></span>
                                            @else
                                            {{ $value->infobox_title }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->infobox_title_ban == Null)
                                            <span class="badge badge-pill badge-info"><strong>No Title</strong></span>
                                            @else
                                            {{ $value->infobox_title_ban }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->infobox_description == Null)
                                            <span class="badge badge-pill badge-info"><strong>No Description</strong></span>
                                            @else
                                            {{ $value->infobox_description }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->infobox_description_ban == Null)
                                            <span class="badge badge-pill badge-info"><strong>No Description</strong></span>
                                            @else
                                            {{ $value->infobox_description_ban }}
                                            @endif
                                        </td>
                                        <td>
                                            @if($value->infobox_status == 1)
                                            <span class="badge badge-pill badge-success"><strong>Active</strong></span>
                                            @else
                                            <span class="badge badge-pill badge-danger"><strong>Inactive</strong></span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('infobox.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{ route('infobox.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                            <!-- ########## infobox status ########### -->
                                            @if($value->infobox_status == 1)
                                            <a href="{{ route('infobox.inactive',$value->id) }}" class="btn btn-dark" title="inactive now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('infobox.active',$value->id) }}" class="btn btn-success" title="active now"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            <!-- ########## end infobox status ########### -->
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
                    <h3 class="box-title">Add Info Box</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('infobox.store') }}" method="post">
                            
                            @csrf

                            <div class="form-group">
                                <h5>Info box Title :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_title" class="form-control">
                                    @error('infobox_title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Info box Title Bangla :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_title_ban" class="form-control">
                                    @error('infobox_title_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Info box Description :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_description" class="form-control">
                                    @error('infobox_description')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Info box Description Bangla :</h5>
                                <div class="controls">
                                    <input type="text"  name="infobox_description_ban" class="form-control">
                                    @error('infobox_description_ban')
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