@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <!-- #### New Transaction ##### -->

        <div class="col-8">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">New Transaction</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                    
                        <form action="{{ route('transaction.store') }}" method="post">
                            
                            @csrf
                            
                            <div class="form-group">
                                <h5>Date :</h5>
							    <input class="form-control" type="date" name="date">
						    </div>

                            <div class="form-group">
								<h5>Business :</h5>
								<div class="controls">
                                <select name="business" class="form-control">
										<option value="" selected="disabled">Select business</option>
                                        @foreach($business as $value)
										<option value="{{$value->business_name}}">{{ $value->business_name}}</option>
                                        @endforeach
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
								<h5>Trx Type :</h5>
								<div class="controls">
									<select name="trx_type" id="trx_type" class="form-control" aria-invalid="false">
										<option value="">Select Trx type</option>
										<option value="1">Cash Received</option>
										<option value="2">Product Purchase</option>
									</select>
								<div class="help-block"></div></div>
							</div>

                            <div class="form-group">
                                <h5>Amount :</h5>
                                <div class="controls">
                                    <input type="text" name="amount" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <h5>Trx By :</h5>
                                <div class="controls">
                                    <input type="text" name="trx_by" class="form-control">
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