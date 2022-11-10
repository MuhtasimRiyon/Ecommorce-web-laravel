@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Transaction list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Date</th>
                                    <th>Business</th>
                                    <th>Trx Type</th>
                                    <th>Trx By</th>
                                    <th>Cash Received Amount</th>
                                    <th>Product Purchase Amount</th>
                                    <th>Amount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($transaction as $key=>$value)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td>{{ $value->date }}</td>
                                        <td>{{ $value->business }}</td>
                                        <td>
                                            @if($value->trx_type == 1)
                                            Cash Received
                                            @else
                                            Product Purchase
                                            @endif
                                        </td>
                                        <td>{{ $value->trx_by }}</td>
                                        <td>{{ $value->cash_received_amount }}</td>
                                        <td>{{ $value->product_purchase_amount }}</td>
                                        <td>{{ $value->amount }}</td>
                                        <td>
                                            <a href="{{ route('transaction.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('transaction.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>

                            <tfoot>
                                <tr>
                                    <th colspan="5">Total :</th>
                                    <th>{{ $cash_received_amount }}</th>
                                    <th>{{ $product_purchase_amount }}</th>
                                    <th colspan="2">{{ $totalAmount }}</th>
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