@extends('admin.admin_master')
@section('admin_body')

<!-- Main content -->
<section class="content">
    <div class="row">

        <div class="col-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Business list</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Business Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach($business as $key=>$value)
                                    <tr>
                                        <td> {{ $key+1 }} </td>
                                        <td>{{ $value->business_name }}</td>
                                        <td>
                                            <a href="{{ route('business.edit',$value->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('business.delete',$value->id) }}" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i> Delete</a>
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