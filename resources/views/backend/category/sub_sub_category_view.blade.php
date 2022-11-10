@extends('admin.admin_master')
@section('admin_body')

<!-- jquery cnd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Sub->Sub Category list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Sub->SubCategory Name English</th>
                                <th>Sub->SubCategory Name Bangla</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($subsubcategory as $value)
                                    <tr>
                                        <td>{{ $value['category']['category_name_en'] }}</td>
                                        <td>{{ $value['subcategory']['subcategory_name_en'] }}</td>
                                        <td>{{ $value->subsubcategory_name_en }}</td>
                                        <td>{{ $value->subsubcategory_name_ban }}</td>
                                        <td>
                                            <a href="{{ route('subsubcategory.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil-square-o"></i> Edit</a>
                                            <a href="{{ route('subsubcategory.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
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

        <!-- #### add sub-subcategory ##### -->

        <div class="col-4">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Add Sub->Sub category</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('subsubcategory.store') }}" method="post">
                            
                            @csrf

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" class="form-control">
										<option value="" selected="disabled">Select Category</option>
                                        @foreach($category as $value)
										<option value="{{$value->id}}">{{ $value->category_name_en}}</option>
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
                                        <!--  -->
									</select>
                                    @error('subcategory_id')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
							</div>

                            <br>

                            <div class="form-group">
                                <h5>Sub->Sub Category Name English:</h5>
                                <div class="controls">
                                    <input type="text"  name="subsubcategory_name_en" class="form-control">
                                    @error('subsubcategory_name_en')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Sub->Sub Category Name Bangla:</h5>
                                <div class="controls">
                                    <input type="text"  name="subsubcategory_name_ban" class="form-control">
                                    @error('subsubcategory_name_ban')
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

<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="category_id"]').on('change',function(){
           var category_id = $(this).val();
           if(category_id){
            $.ajax({
                url:"{{ url('/category/sub/sub/category/ajax') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    var d = $('select[name="subcategory_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>' );
                    });
                },
            });
           }else{
            alart('danger');
           }
        });
    });
</script>
    
@endsection