@extends('admin.layouts.main')
<link href="{{ asset('dashboard/css/style.css') }}" rel="stylesheet" type="text/css">
<style>
 
        .mbox {   
    display: inline-block;
    width: 10px;
    height: 10px;
    margin: 10px 55px 10px 25px;
    padding-left: 4px;
}
</style>
   
@section('content')
    <div class="container-fluid">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Success!</strong> {{ session('message') }}
            </div>
        @endif
        <style type="text/css">
            .dash-head:hover {
                text-decoration: none !important;
            }
        </style>
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>
      
        <hr/>
    </div>
@endsection
@section('addonJsScript')
    <script src="{{ asset("dashboard/js/common.js")}}"></script>

    <script type="text/javascript">
  
    </script>
@endsection