@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                                <li class="breadcrumb-item active">Portfolio</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title d-flex justify-content-between align-items-center">Portfolio Management
                                <a type="button" class="btn btn-success waves-effect waves-light"
                                    href="{{ route('portfolio.save') }}">
                                    <i class="fa fa-plus"></i> New Portfolio
                                </a>
                            </h4>


                        </div>
                        <div class="card-body">


                            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable"
                                            class="table table-bordered dt-responsive wrap dataTable no-footer dtr-inline"
                                            role="grid" aria-describedby="datatable_info">
                                            <thead>
                                                <tr role="row">
                                                    <th> Name </th>
                                                    <th> Title</th>
                                                    <th>Description</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($portfolio as $item)
                                                    <tr>
                                                        <td>{{ $item->portfolio_name }}</td>
                                                        <td>{{ $item->portfoli_title }}</td>
                                                        <td>{{ $item->portfoli_description }}</td>
                                                        <td>{{ $item->portfoli_image }}</td>
                                                        <td><a type="button"
                                                                class="btn btn-success waves-effect waves-light"
                                                                href="{{ route('portfolio.edit') }}">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a type="button"
                                                                class="btn btn-danger waves-effect waves-light"
                                                                href="{{ route('portfolio.remove') }}">
                                                                <i class="fa fa-trash"></i>
                                                            </a>
                                                        </td>

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script>
        var table = $('#datatable').DataTable({

        });
    </script>

 
@endsection
