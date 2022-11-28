@extends('admin.admin_master')
@section('admin')
    <div class="content-wrapper">
        <div class="container-full">
            <!-- Content Header (Page header) -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Assign Subject List</h3>
                                <a href="{{ route('assign.subject.add') }}" style="float: right;"
                                    class=" text-white btn   btn-success mb-5"> Add Assign Subject</a>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">SL</th>
                                                <th>Class Name</th>
                                                <th width="25%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allData as $key => $assign)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td> {{ $assign['student_class']['name'] }}</td>
                                                    {{-- <td> {{ $assign->class_id }}</td> --}}
                                                    <td>
                                                        <a href="{{ route('assign.subject.edit', $assign->class_id) }}"
                                                            class=" text-white btn btn-info">Edit</a>
                                                        <a href="{{ route('assign.subject.details', $assign->class_id) }}"
                                                            class=" text-white btn btn-primary">Details</a>
                                                        <a href="{{ route('assign.subject.delete', $assign->class_id) }}"
                                                            class=" text-white btn btn-danger" id="delete">Delete</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
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
        </div>
    </div>
@endsection
