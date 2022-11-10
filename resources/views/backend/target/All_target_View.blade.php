@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Target list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <form action="{{ route('all.target') }}" method="post">
                                    
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

                        <div class="form-group">
                            <h5>Business :</h5>
                            <div class="controls">
                            <select name="business" class="form-control">
                                    <option value="" selected="disabled">Select business</option>
                                    @foreach($business as $value)
                                    <option value="{{$value->id}}">{{ $value->business_name}}</option>
                                    @endforeach
                                </select>
                            <div class="help-block"></div></div>
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
                                    <th>Year</th>
                                    <th>Month</th>
                                    <th>Business Name</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($target as $key=>$value)

                                    <?php
                                        $get_business_name = $business->where('id',$value->business_id)->first();
                                    ?>

                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td> {{ $value->year }} </td>
                                        <td>
                                            @if($value->month == 1)
                                            January
                                            @elseif($value->month == 2)
                                            February
                                            @elseif($value->month == 3)
                                            March
                                            @elseif($value->month == 4)
                                            April
                                            @elseif($value->month == 5)
                                            May
                                            @elseif($value->month == 6)
                                            June
                                            @elseif($value->month == 7)
                                            July
                                            @elseif($value->month == 8)
                                            August
                                            @elseif($value->month == 9)
                                            September
                                            @elseif($value->month == 10)
                                            October
                                            @elseif($value->month == 11)
                                            November
                                            @else
                                            December
                                            @endif
                                        </td>
                                        <td> {{ (!empty($get_business_name) ? $get_business_name->business_name : "") }} </td>
                                        <td> {{ $value->amount }} </td>
                                        <td>
                                            <a href="{{ route('target.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('target.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="4">Total :</th>
                                    <th colspan="2">{{ $amount }}</th>
                                </tr>
                            </tfoot>

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