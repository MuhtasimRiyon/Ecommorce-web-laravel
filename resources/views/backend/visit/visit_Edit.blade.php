@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### Edit Visit ##### -->

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Visit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('visit.update') }}" method="post">
                            
                            @csrf

                            <input type="hidden" name="id" value="{{ $visit->id }}">
                            
                            <div class="form-group">
                                <h5>Date :</h5>
							    <input class="form-control" type="date" name="date" value="{{$visit->date}}">
						    </div>

                            <div class="form-group">
                                <h5>Shop Name :</h5>
                                <div class="controls">
                                    <input type="text" name="shop_name" class="form-control" value="{{$visit->shop_name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Proprietor Name :</h5>
                                <div class="controls">
                                    <input type="text" name="proprietor_name" class="form-control" value="{{$visit->proprietor_name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Mobile :</h5>
                                <div class="controls">
                                    <input type="text"  name="mobile_1" class="form-control" pattern="[0-9]{11}" title="Please input number and 11 character" value="{{$visit->mobile_1}}">
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Alternate Mobile :</h5>
                                <div class="controls">
                                    <input type="text"  name="mobile_2" class="form-control" pattern="[0-9]{11}" title="Please input number and 11 character" value="{{$visit->mobile_2}}">
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Email :</h5>
                                <div class="controls">
                                    <input type="email" name="Email" class="form-control" value="{{$visit->Email}}">
                                </div>
                            </div>


                            <div class="form-group">
								<h5>Zila :</h5>
								<div class="controls">
                                <select name="zila" class="form-control">
										<option value="" disabled>Select District</option>
                                        @foreach($districts as $value)
										<option value="{{$value->id}}" {{ ($visit->zila == $value->id) ? "selected" : "" }}>{{ $value->name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
								<h5>Upazilla :</h5>
								<div class="controls">
                                <select name="upzila" class="form-control">
										<option value="" disabled>Select Upazilla</option>
                                        @foreach($upazilas as $value)
										<option value="{{$value->id}}" {{ ($visit->upzila == $value->id) ? "selected" : ""}}>{{ $value->name}}</option>
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
										<option value="{{$value->id}}" {{ ($visit->marketer == $value->id) ? "selected" : ""}}>{{ $value->marketer_name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
                                <h5>Address :</h5>
                                <div class="controls">
                                    <textarea name="address" rows="5" cols="5" class="form-control" placeholder="Textarea" value="{{$visit->address}}"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Remarks :</h5>
                                <div class="controls">
                                    <textarea name="remark" rows="5" cols="5" class="form-control" placeholder="Textarea" value="{{$visit->remark}}"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
								<h5>Interested :</h5>
                                <div class="box-body">
                                    <div class="demo-radio-button">
                                        
                                        <input name="interested" value="1" {{ ($visit->interested == "1") ? "checked" : ""}} type="radio" id="radio_1" class="with-gap radio-col-info">
                                        <label for="radio_1">Yes</label>

                                        <input name="interested" value="2" {{ ($visit->interested == "2") ? "checked" : ""}} type="radio" id="radio_2" class="with-gap radio-col-info">
                                        <label for="radio_2">No</label>
                                        
                                    </div>
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