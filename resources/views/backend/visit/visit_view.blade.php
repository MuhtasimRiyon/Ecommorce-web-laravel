@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### New Visit ##### -->

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">New Visit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('visit.store') }}" method="post">
                            
                            @csrf
                            
                            <div class="form-group">
                                <h5>Date :</h5>
							    <input class="form-control" type="date" name="date">
						    </div>

                            <div class="form-group">
                                <h5>Shop Name :</h5>
                                <div class="controls">
                                    <input type="text" name="shop_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Proprietor Name :</h5>
                                <div class="controls">
                                    <input type="text" name="proprietor_name" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Mobile :</h5>
                                <div class="controls">
                                    <input type="text"  name="mobile_1" class="form-control" pattern="[0-9]{11}" title="Please input number and 11 character">
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Alternate Mobile :</h5>
                                <div class="controls">
                                    <input type="text"  name="mobile_2" class="form-control" pattern="[0-9]{11}" title="Please input number and 11 character">
                                    @error('mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Email :</h5>
                                <div class="controls">
                                    <input type="email" name="Email" class="form-control">
                                </div>
                            </div>

                            <!-- <div class="form-group">
								<h5>Division :</h5>
								<div class="controls">
                                <select name="division" id="divisionId" class="form-control">
										<option value="" selected="disabled">Select Division</option>
                                        @foreach($divisions as $value)
										<option value="{{ $value->id }}">{{ $value->name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div> -->

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
                                <h5>Address :</h5>
                                <div class="controls">
                                    <textarea name="address" rows="5" cols="5" class="form-control" placeholder="Textarea"></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Remarks :</h5>
                                <div class="controls">
                                    <textarea name="remark" rows="5" cols="5" class="form-control" placeholder="Textarea"></textarea>
                                </div>
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

<script>

        // get distric list
        function getDistrictFn() {
            $('#districtId').empty();
            var _divisionId = $('#divisionId').val();
            $.ajax({
                method: "POST",
                url: "{{route('district-list')}}",
                data: {id: _divisionId, token: "{{ csrf_token() }}"}
            }).then(function (response) {
                $('#districtId').append(response);
            });
        }

        // get Upazila list
        function getUpazilaFn() {
            $('#upazilaId').empty();
            var _districtId = $('#districtId').val();
            $.ajax({
                method: "POST",
                url: "{{route('upazila-list')}}",
                data: {id: _districtId, token: "{{ csrf_token() }}"}
            }).then(function (response) {
                $('#upazilaId').append(response);
            });
        }

        // get Upazila list
        function getUnionFn() {
            $('#unionId').empty();
            var _upazilaId = $('#upazilaId').val();
            $.ajax({
                method: "POST",
                url: "{{route('union-list')}}",
                data: {id: _upazilaId, token: "{{ csrf_token() }}"}
            }).then(function (response) {
                $('#unionId').append(response);
            });
        }
</script>

@endsection