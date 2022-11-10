@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Category list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category Icon</th>
                                <th>Category Name English</th>
                                <th>Category Name Bangla</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($category as $value)
                                    <tr>
                                        <td><span><i class="{{ $value->category_icon }}"></i></span></td>
                                        <td>{{ $value->category_name_en }}</td>
                                        <td>{{ $value->category_name_ban }}</td>
                                        <td>
                                            <a href="{{ route('category.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <a href="{{ route('category.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
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

        <!-- #### add ccategory ##### -->

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('category.store') }}" method="post">
                            
                            @csrf

                            <div class="form-group">
                                <h5>Category Name English:</h5>
                                <div class="controls">
                                    <input type="text"  name="category_name_en" class="form-control">
                                    @error('category_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Category Name Bangla:</h5>
                                <div class="controls">
                                    <input type="text"  name="category_name_ban" class="form-control">
                                    @error('category_name_ban')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Category Icon:</h5>
                                <div class="controls">
                                    <input type="text"  name="category_icon" class="form-control">
                                    @error('category_icon')
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