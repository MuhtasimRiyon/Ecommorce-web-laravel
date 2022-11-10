@extends('admin.admin_master')
@section('admin_body')

<!-- jquery cnd -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container-full">
    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
        <div class="box-header with-border">
            <h4 class="box-title">Edit Product</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
            <div class="col">
                <form method="post" action="{{ route('product.update') }}">
                    @csrf

                    <input type="hidden" name="id" value="{{ $product->id }}">

                    <div class="row">
                        <div class="col-12">

                            <!-- ##### 1st row start ##### -->

                            <div class="row">

                                <div class="col-md-3">
                                    <!-- Brand select -->
                                    <div class="form-group">
								        <h5>Brand Select <span class="text-danger">*</span></h5>
								        <div class="controls">
									        <select name="brand_id" class="form-control" required="">
                                                <option value="" selected="disabled">Select Brand</option>
                                                @foreach($brand as $value)
                                                <option value="{{$value->id}}"{{ $value->id == $product->brand_id ? 'selected' : '' }}>{{ $value->brand_name_en}}</option>
                                                @endforeach
									        </select>
                                            @error('brand_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
							            </div>
                                    </div> 
                                    <!-- Brand select end -->
                                </div>

                                <div class="col-md-3">
                                    <!-- category select -->
                                    <div class="form-group">
								        <h5>Category Select <span class="text-danger">*</span></h5>
								        <div class="controls">
									        <select name="category_id" class="form-control" required="">
                                                <option value="" selected="disabled">Select Category</option>
                                                @foreach($category as $value)
                                                <option value="{{$value->id}}"{{ $value->id == $product->category_id ? 'selected' : '' }}>{{ $value->category_name_en}}</option>
                                                @endforeach
									        </select>
                                            @error('category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
							            </div>
                                    </div>
                                    <!-- category select end -->
                                </div>

                                <div class="col-md-3">
                                    <!-- sub category select -->
                                    <div class="form-group">
								        <h5>Sub Category Select <span class="text-danger">*</span></h5>
								        <div class="controls">
									        <select name="subcategory_id" class="form-control" required="">
                                                <option value="" selected="disabled">Select Sub Category</option>
                                                @foreach($subcategory as $value)
                                                <option value="{{$value->id}}"{{ $value->id == $product->subcategory_id ? 'selected' : '' }}>{{ $value->subcategory_name_en}}</option>
                                                @endforeach
									        </select>
                                            @error('subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
							            </div>
                                    </div>
                                    <!-- sub category select end -->
                                </div>

                                <div class="col-md-3">
                                    <!-- sub sub category select -->
                                    <div class="form-group">
								        <h5>Sub->sub Category Select <span class="text-danger">*</span></h5>
								        <div class="controls">
									        <select name="subsubcategory_id" class="form-control" required="">
                                                <option value="" selected="disabled">Select sub->sub Category</option>
                                                @foreach($subsubcategory as $value)
                                                <option value="{{$value->id}}"{{ $value->id == $product->subsubcategory_id ? 'selected' : '' }}>{{ $value->subsubcategory_name_en}}</option>
                                                @endforeach
									        </select>
                                            @error('subsubcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
							            </div>
                                    </div>
                                    <!-- sub sub category select end -->
                                </div>

                            </div>

                            <!-- ##### 1st row end ##### -->

                            <!-- ##### 2nd row start ##### -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Name English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_en" class="form-control" required="" value="{{ $product->product_name_en }}">
                                            @error('product_name_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Name Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_name_ban" class="form-control" required="" value="{{ $product->product_name_ban }}">
                                            @error('product_name_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ##### 2nd row end ##### -->

                            <!-- ##### 3rd row start ##### -->

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product code <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_code" class="form-control" required="" value="{{ $product->product_code }}">
                                            @error('product_code')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Quantity <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_qty" class="form-control" required="" value="{{ $product->product_qty }}">
                                            @error('product_qty')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Tags English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_en" class="form-control" data-role="tagsinput" value="{{ $product->product_tags_en }}">
                                            @error('product_tags_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Tags Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_tags_ban" class="form-control" value="{{ $product->product_tags_ban }}" data-role="tagsinput">
                                            @error('product_tags_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ##### 3rd row end ##### -->

                            <!-- ##### 4rd row start ##### -->

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Size English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_en" class="form-control" value="{{ $product->product_size_en }}" data-role="tagsinput" required="">
                                            @error('product_size_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Size Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_size_ban" class="form-control" value="{{ $product->product_size_ban }}" data-role="tagsinput" required="">
                                            @error('product_size_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Color English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_en" class="form-control" value="{{ $product->product_color_en }}" data-role="tagsinput" >
                                            @error('product_color_en')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5>Product Color Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="product_color_ban" class="form-control"  value="{{ $product->product_color_ban }}" data-role="tagsinput" >
                                            @error('product_color_ban')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ##### 4rd row end ##### -->

                            <!-- ##### 5th row start ##### -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Selling Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="selling_price" class="form-control" required="" value="{{ $product->selling_price }}">
                                            @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Discount Price <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="discount_price" class="form-control"  value="{{ $product->discount_price }}">
                                            @error('discount_price')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ##### 5th row end ##### -->

                            <!-- ##### 6th row start ##### -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_en" class="form-control" required="">{!! $product->short_descp_en !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Short Description Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea name="short_descp_ban" class="form-control" required="">{!! $product->short_descp_ban !!}</textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ##### 6th row end ##### -->

                            <!-- ##### 7th row start ##### -->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Long Description English <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="long_descp_en" rows="10" cols="80" value="{{ $product->long_descp_en }}">
                                                {!! $product->long_descp_en !!}
						                    </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Product Long Description Bangla <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor2" name="long_descp_ban" rows="10" cols="80" value="{{ $product->long_descp_ban }}">
                                            {!! $product->long_descp_ban !!}
						                    </textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- ##### 7th row end ##### -->
                        </div>
                        <!-- ###### end of col-12 ##### -->
                    </div>
                    <!-- ###### end of row ##### -->

                    <br>

                    <hr>

                    <h5>View option :</h5>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1" {{ $product->hot_deals == 1 ? 'checked' : '' }} >
                                        <label for="checkbox_2">Hot deal</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_3" name="featured" value="1" {{ $product->featured == 1 ? 'checked' : '' }} >
                                        <label for="checkbox_3">Featured</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="controls">
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1" {{ $product->special_offer == 1 ? 'checked' : '' }} >
                                        <label for="checkbox_4">Special Offer</label>
                                    </fieldset>
                                    <fieldset>
                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1" {{ $product->special_deals == 1 ? 'checked' : '' }} >
                                        <label for="checkbox_5">Special Deal</label>
                                    </fieldset>
                                </div>
                            </div>
                        </div>

                    </div>
                    
                    <!-- ###### submit button ##### -->

                    <div class="text-xs-right">
                        <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>

                </form>

            </div>
            <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

    <!-- ############# Multi Img update ########## -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">

				  <div class="box-header">
					<h4 class="box-title">Multiple Image <strong>Update</strong></h4>
				  </div>

                  <form method="post" action="{{ route('update.product.mulimg') }}" enctype="multipart/form-data">
                    @csrf
                    <br>
                    <div class="row row-sm">
                        @foreach($multiImgs as $value)
                        <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset($value->photo_name) }}" class="card-img-top" style="width:250px; height:230px">
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <a href="{{ route('multiImg.Dlt',$value->id) }}" class="btn btn-sm btn-danger" title="Delete Image"><i class="fa fa-trash"></i></a>
                                    </h5>
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" class="form-control" name="multi_img[{{$value->id}}]">
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- ###### submit button ##### -->

                    <div class="text-xs-right">
                        <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>

                    <br>

                  </form>

				</div>
			</div>
        </div>
    </section>

    <!-- ############# End Multi Img update ########## -->

    <!-- ############# thambnail Img update ########## -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
				<div class="box bt-3 border-info">

				  <div class="box-header">
					<h4 class="box-title">Thambnail Image <strong>Update</strong></h4>
				  </div>

                  <form method="post" action="{{ route('update.product.thambnail') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="old_img" value="{{ $product->product_thambnail }}">
                    <br>
                    <div class="row row-sm">
                        <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img src="{{ asset($product->product_thambnail) }}" class="card-img-top" style="width:250px; height:230px">
                                <div class="card-body">
                                    <p class="card-text">
                                        <div class="form-group">
                                            <label class="form-control-label">Change Image <span class="tx-danger">*</span></label>
                                            <input type="file" name="product_thambnail" class="form-control" onChange="mainThambnailUrl(this)">
                                            <img src="" id="maiThmb">
                                        </div>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ###### submit button ##### -->

                    <div class="text-xs-right">
                        <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                    </div>

                    <br>

                  </form>

				</div>
			</div>
        </div>
    </section>

    <!-- ############# End thambnail Img update ########## -->

</div>

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
                    $('select[name="subsubcategory_id"]').html('');
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

        $('select[name="subcategory_id"]').on('change',function(){
           var subcategory_id = $(this).val();
           if(subcategory_id){
            $.ajax({
                url:"{{ url('category/sub/sub/getsubsubcat/ajax') }}/"+subcategory_id,
                type:"GET",
                dataType:"json",
                success:function(data){
                    var d = $('select[name="subsubcategory_id"]').empty();
                    $.each(data,function(key,value){
                        $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.subsubcategory_name_en + '</option>' );
                    });
                },
            });
           }else{
            alart('danger');
           }
        });

    });
</script>

<!-- for display thambnail img -->
<script type="text/javascript">
    function mainThambnailUrl(input){
        if(input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#maiThmb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

<!-- ======================================= Show Multi Image JavaScript Code ================================================= -->

<script>
 
  $(document).ready(function(){
    $('#multi_img').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data
            
            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element 
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });
            
        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
        }
    });
  });
   
</script>
    
@endsection