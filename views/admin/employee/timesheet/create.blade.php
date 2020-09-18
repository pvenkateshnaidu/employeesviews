@extends('admin.layouts.main')

@section('content')
@php
$assignments = config('wallet.assignments');
$servicecodes =  config('wallet.servicecodes');
@endphp
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="container-fluid">
    <div class="card">               
        <div class="card-body">
            <h2>Add TimeSheet</h2>
            <form action="{{ url('timesheet') }}" id="addUser" method="post" enctype="multipart/form-data">
                <div class="row">
                    {{ csrf_field() }}
                   
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="dateduration">Date:</label>
                            @php 
                            $currentdate = \Carbon\Carbon::now()->format('Y-m-d');                          
                            @endphp
                      
                            <input type="date" required class="form-control {{ $errors->has('fromDate') ? ' is-invalid' : '' }}" name="fromDate" value="{{$currentdate}}" />
                            <div class="invalid-feedback">{{ $errors->first('fromDate')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="assignment">Assignment:</label>
                            <select class="form-control"  name="assignment" id="assignment" realonly>
                              <option value="{{\Auth::user()->technologyAssign}}">{{\Auth::user()->technologyAssign}}</option>
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('assignment')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="serviceCode">Service Code:</label>
                            <select class="form-control {{ $errors->has('serviceCode') ? ' is-invalid' : '' }}" required name="serviceCode" id="serviceCode">
                                @foreach ($servicecodes as $key => $value)
                                <option value="{{$key}}" {{(old('serviceCode') == $key) ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('serviceCode')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="duration">Duration:(Hours)</label>
                            <input type="number" min="1" max="15"  class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" id="duration" placeholder="Duration" name="duration" required value="{{old('duration')}}">
                            <div class="invalid-feedback">{{ $errors->first('duration')  }}</div>
                        </div>
                    </div>
                     
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label for="document">Document:</label>
                            <input type="file" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" id="document" placeholder="document" name="document"  value="{{old('document')}}">
                            <div class="invalid-feedback">{{ $errors->first('document')  }}</div>
                        </div>
                    </div>
                   
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary float-right" id="submitForm"> Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container-fluid">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{ session('message') }}
    </div>    
    @endif
    <div class="row">
        <div class="col-lg-6">
            <h2>TIme Sheets</h2>
        </div>
        
    </div>       
    

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Employee Name</th>
                    <th>Date</th>                  
                    <th>Duration (Hours)</th>
                    <th>Assignment</th>
                    <th>Service Code</th>          
                    <th>Document</th>
                    <th>Created At</th>  
                    <th>Action</th>                
                </tr>
            </thead>
         
            <tbody>
                @php
                $i  = 1;
                $timesheetType = config('wallet.timesheetTypes');
                $status = config('wallet.timesheetstatus');
                @endphp
                @foreach ($timesheets as $timesheet)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $timesheet->user_details->name }}</td>
                    <td>{{  \Carbon\Carbon::parse($timesheet->fromDate)->format('d F Y') }}</td>                   
                    <td>{{ $timesheet->duration }}</td>
                    <td>{{ $timesheet->assignment }}</td>    
                    <td>{{ $timesheet->serviceCode }}</td> 
                    <td>   @if($timesheet->document)
                        <a href="{{route('timesheetfile', $timesheet->document)}}"><img src="{{ asset('dashboard/img/word.png') }}" /></a>   
                        @endif</td>             
                    <td>{{ \Carbon\Carbon::parse($timesheet->created_at)->format('d F Y H:i:s') }}</td>
                    <td><a href="{{\url('timesheet/'.$timesheet->timeSheetId.'/edit')}}"
                        class="btn btn-circle btn-sm btn-primary" data-toggle="tooltip"
                        title="Edit Timesheet "><i class="fa fa-magic"></i></a></td>
                    
                </tr>
                @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
     
    </div>
</div>
@endsection

@section('jQeryValidationJs')
@include('admin.layouts.validationjs');
@endsection

@section('addonJsScript')
<script type="text/javascript">

    $(document).ready(function () {
        $("#addUser").validate();
    });
</script>
@endsection