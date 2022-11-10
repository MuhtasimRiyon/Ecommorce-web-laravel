@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Set Target</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('target.store') }}" method="post">
                            
                            @csrf

                                <div class="form-group">
                                    <h5>Year :</h5>
                                    <div class="controls">
                                    <select name="year" class="form-control">
                                        <option value="" disabled>Select Year</option>
                                        @for ($x = date('Y'); $x <= date('Y')+10; $x++)
                                        <option>{{ $x}}</option>
                                        @endfor
                                        <div class="help-block"></div></div>
                                    </select>
                                    
                                </div>

                                <div class="form-group">
                                    <h5>Month :</h5>
                                    <div class="controls">
									<select name="month" id="month" class="form-control">
										<option value="" disabled>Select Month</option>
										<option value="1">January</option>
                                        <option value="3">February</option>
										<option value="2">March</option>
                                        <option value="4">April</option>
                                        <option value="5">May</option>
                                        <option value="6">June</option>
                                        <option value="7">July</option>
                                        <option value="8">August</option>
                                        <option value="9">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
									</select>
								    <div class="help-block"></div></div>
                                </div>

                                <div class="box-body">
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
                                                            <input type="number" step="any" name="amount[]">
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>

                                        </table>
                                    </div>
                                </div>

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