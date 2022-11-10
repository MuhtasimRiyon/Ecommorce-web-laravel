@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Comission Edit</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('comission.update') }}" method="post">

                            <input type="hidden" name="id" value="{{ $commission->id }}">
                            
                            @csrf

                                <div class="form-group">
                                    <h5>Year :</h5>
                                    <div class="controls">
                                    <select name="year" class="form-control">
                                        <option value="" disabled>Select Year</option>
                                        @for ($x = date('Y'); $x <= date('Y')+10; $x++)
                                        <option {{ ($commission->year == $x) ? "selected" : "" }} >{{$x}} </option>
                                        @endfor
                                        <div class="help-block"></div></div>
                                    </select>
                                    
                                </div>

                                <div class="form-group">
                                    <h5>Month :</h5>
                                    <div class="controls">
									<select name="month" id="month" class="form-control" value="{{$commission->month}}">
										<option value="" disabled>Select Month</option>
										<option value="1" {{ ($commission->month == "1") ? "selected" : "" }} >January</option>
                                        <option value="3" {{ ($commission->month == "2") ? "selected" : "" }} >February</option>
										<option value="2" {{ ($commission->month == "3") ? "selected" : "" }} >March</option>
                                        <option value="4" {{ ($commission->month == "4") ? "selected" : "" }} >April</option>
                                        <option value="5" {{ ($commission->month == "5") ? "selected" : "" }} >May</option>
                                        <option value="6" {{ ($commission->month == "6") ? "selected" : "" }} >June</option>
                                        <option value="7" {{ ($commission->month == "7") ? "selected" : "" }} >July</option>
                                        <option value="8" {{ ($commission->month == "8") ? "selected" : "" }} >August</option>
                                        <option value="9" {{ ($commission->month == "9") ? "selected" : "" }} >September</option>
                                        <option value="10" {{ ($commission->month == "10") ? "selected" : "" }} >October</option>
                                        <option value="11" {{ ($commission->month == "11") ? "selected" : "" }} >November</option>
                                        <option value="12" {{ ($commission->month == "12") ? "selected" : "" }} >December</option>
									</select>
								    <div class="help-block"></div></div>
                                </div>

                                <div class="form-group">
                                    <h5>Business :</h5>
                                    <div class="controls">
                                    <select name="business" class="form-control">
                                            <option value="" selected="disabled">Select business</option>
                                            @foreach($business as $value)
                                            <option value="{{$value->id}}" {{ ($commission->business_id == $value->id) ? "selected" : "" }}>{{ $value->business_name}}</option>
                                            @endforeach
                                        </select>
                                    <div class="help-block"></div></div>
							    </div>

                                <div class="form-group">
                                    <h5>Amount :</h5>
                                    <div class="controls">
                                        <input type="number" step="any" name="amount" value="{{$commission->amount}}" >
                                    </div>
                                </div>

                                <!-- <div class="box-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">

                                            <thead>
                                                <tr>
                                                    <th>SL</th>
                                                    <th>Business Name</th>
                                                    <th>Amount</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach($business as $key=>$value)
                                                    <tr>
                                                        <td> {{ $key+1 }} </td>
                                                        <td> {{ $value->business_name }} </td>
                                                        <td>
                                                            <input type="hidden" value="{{ $value->id }}" name="business_id[]">
                                                            <input type="number" step="any" name="amount[]" >
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div> -->

                            <!-- ### Submit button ### -->

                            <br>

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
	</div>

</section>
<!-- /.content -->
    
@endsection