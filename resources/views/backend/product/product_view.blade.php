@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Product list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Code</th>
                                <th>Image</th>
                                <th>Product Name English</th>
                                <th>Product Name Bangla</th>
                                <th>Product Quantity</th>
                                <!-- <th>Product Tags English</th>
                                <th>Product Tags Bangla</th>
                                <th>Product Size English</th>
                                <th>Product Size Bangla</th>
                                <th>Product Color English</th>
                                <th>Product Color Bangla</th> -->
                                <th>Price</th>
                                <th>Discount price</th>
                                <!-- <th>short Descp En</th>
                                <th>short Descp Ban</th>
                                <th>long Descp En</th>
                                <th>long Descp Ban</th> -->
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach($products as $value)
                                    <tr>
                                        <td>{{ $value->product_code }}</td>
                                        <td><img src="{{ asset($value->product_thambnail) }}" style="width:50px; height:50px"></td>
                                        <td>{{ $value->product_name_en }}</td>
                                        <td>{{ $value->product_name_ban }}</td>
                                        <td>{{ $value->product_qty }} PC </td>
                                        <!-- <td>{{ $value->product_tags_en }}</td>
                                        <td>{{ $value->product_tags_ban }}</td>
                                        <td>{{ $value->product_size_en }}</td>
                                        <td>{{ $value->product_size_ban }}</td>
                                        <td>{{ $value->product_color_en }}</td>
                                        <td>{{ $value->product_color_ban }}</td> -->
                                        <td>TK {{ $value->selling_price }}</td>
                                        <td>
                                            @if($value->discount_price == NULL)
                                            <span class="badge badge-pill badge-danger">No discount</span>
                                            @else
                                            
                                            @php
                                            $amount = $value->selling_price - $value->discount_price;
                                            $disPer = ($amount/$value->selling_price)*100;
                                            @endphp
                                            <span class="badge badge-pill badge-info">{{round($disPer)}}%</span>
                                            @endif
                                        </td>

                                        <!-- <td>{{ $value->short_descp_en }}</td>
                                        <td>{{ $value->short_descp_ban }}</td>
                                        <td>{{ $value->long_descp_en }}</td>
                                        <td>{{ $value->long_descp_ban }}</td> -->

                                        <!-- status -->
                                        <td>
                                            @if($value->status == 1)
                                            <span class="badge badge-pill badge-success"><strong>Active</strong></span>
                                            @else
                                            <span class="badge badge-pill badge-danger"><strong>Inactive</strong></span>
                                            @endif
                                        </td>

                                        <!-- Action -->
                                        <td>
                                            <a href="{{ route('product.edit',$value->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                            <a href="{{ route('product.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                            <!-- ########## product status ########### -->
                                            @if($value->status == 1)
                                            <a href="{{ route('product.inactive',$value->id) }}" class="btn btn-dark" title="inactive now"><i class="fa fa-arrow-down"></i></a>
                                            @else
                                            <a href="{{ route('product.active',$value->id) }}" class="btn btn-success" title="active now"><i class="fa fa-arrow-up"></i></a>
                                            @endif
                                            <!-- ########## end product status ########### -->
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
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
    
@endsection