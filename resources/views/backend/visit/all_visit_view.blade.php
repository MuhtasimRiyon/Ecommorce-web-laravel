@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Visit list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="{{ route('all.visit') }}" method="post">
                                    
                        @csrf
                        
                        <div class="form-group">
                            <h5>Start Date :</h5>
                            <input class="form-control" type="date" name="start_date">
                        </div>
        
                        <div class="form-group">
                            <h5>End Date :</h5>
                            <input class="form-control" type="date" name="end_date">
                        </div>
        
                            <div class="form-group">
								<h5>Zila :</h5>
								<div class="controls">
                                <select name="zila" id="districtId" class="form-control">
										<option value="" selected="disabled">Select District</option>
                                        @foreach($districts as $value)
										<option value="{{$value->id}}">{{ $value->name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
								<h5>Upazilla :</h5>
								<div class="controls">
                                <select name="upzila" id="upazilaId" class="form-control">
										<option value="" selected="disabled">Select Upazilla</option>
                                        @foreach($upazilas as $value)
										<option value="{{$value->id}}">{{ $value->name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
								<h5>Marketer :</h5>
								<div class="controls">
                                <select name="marketer" class="form-control">
										<option value="" selected="disabled">Select Marketer</option>
                                        @foreach($marketer as $value)
										<option value="{{$value->id}}">{{ $value->marketer_name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
								<h5>Interested :</h5>
                                <div class="box-body">
                                    <div class="demo-radio-button">
                                        
                                        <input name="interested" value="1" type="radio" id="radio_1" class="with-gap radio-col-info">
                                        <label for="radio_1">Yes</label>

                                        <input name="interested" value="2" type="radio" id="radio_2" class="with-gap radio-col-info">
                                        <label for="radio_2">No</label>
                                        
                                    </div>
                                </div>
                            </div>
        
                        <!-- ### Submit button ### -->
        
                        <div class="text-xs-right">
                            <Input type="submit" class="btn btn-rounded btn-primary mb-5" value="Go">
                        </div>
        
                    </form>

                    <br>
                    <hr>
                    <br>

                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Shop Name</th>
                                    <th>Proprietor Name</th>
                                    <th>Mobile</th>
                                    <th>Alternate Mobile</th>
                                    <th>Email</th>
                                    <th>Zilla</th>
                                    <th>Upazilla</th>
                                    <th>Marketer</th>
                                    <th>Address</th>
                                    <th>Remarks</th>
                                    <th>Interested</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($visit as $key=>$value)
                                <?php
                                    $district = $districts->where('id',$value->zila)->first();
                                    $upazila = $upazilas->where('id',$value->upzila)->first();
                                    $visitMarketer = $visitMarketers->where('id',$value->marketer)->first();

                                ?>
                                <tr>
                                    <th> {{ $key+1 }} </th>
                                    <th>{{ $value->date }}</th>
                                    <th>{{ $value->shop_name }}</th>
                                    <th>{{ $value->proprietor_name }}</th>
                                    <th>{{ $value->mobile_1 }}</th>
                                    <th>{{ $value->mobile_2 }}</th>
                                    <th>{{ $value->Email }}</th>
                                    <th>{{ (!empty($district) ? $district->name : "") }}</th>
                                    <th>{{ (!empty($upazila) ? $upazila->name : "") }}</th>
                                    <th>{{ (!empty($visitMarketer) ? $visitMarketer->marketer_name : "") }}</th>
                                    <th>{{ $value->address }}</th>
                                    <th>{{ $value->remark }}</th>
                                    <th>
                                        @if($value->interested == 1)
                                        Yes
                                        @else
                                        No
                                        @endif
                                    </th>
                                    <th>
                                        <a href="{{ route('visit.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                        <a href="{{ route('visit.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                    </th>
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