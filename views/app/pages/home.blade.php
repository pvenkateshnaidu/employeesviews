@extends('app.layouts.main')

@section('content')
<div class="container-fluid">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{ session('message') }}
    </div>    
    @endif

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

   <!-- <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Queries</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patels['all']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-area fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">In Progress </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patels['inProgress']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hourglass fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Completed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patels['completed']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ready</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patels['ready']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-lemon fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Failed</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$patels['failed']}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <hr/>

    <div class="row">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Recent Requests</h1>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <th>Used</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Full Name</td>
                        <td>Gender</td>
                        <td>Used</td>
                        <td>Status</td>
                        <td>Actions</td>
                    </tr>
                </tbody>

            </table>
        </div>   
    </div>
</div>
@endsection
