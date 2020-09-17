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
            <h2>Edit TimeSheet</h2>
            <form action="{{ url('timesheet/'.$timesheet->timeSheetId) }}" id="addUser" method="post" enctype="multipart/form-data">
                <div class="row">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="dateduration">Date:</label>
                            @php 
                            $currentdate = \Carbon\Carbon::now()->format('Y-m-d');                          
                            @endphp
                      
                            <input type="date" required class="form-control {{ $errors->has('fromDate') ? ' is-invalid' : '' }}" name="fromDate" value="{{\Carbon\Carbon::parse($timesheet->fromDate)->format('Y-m-d')}}" />
                            <div class="invalid-feedback">{{ $errors->first('fromDate')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="assignment">Assignment:</label>
                            <select class="form-control {{ $errors->has('assignment') ? ' is-invalid' : '' }}" required name="assignment" id="assignment">
                                @foreach ($assignments as $key => $value)
                                <option value="{{$key}}" {{($timesheet->assignment == $key) ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('assignment')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="serviceCode">Service Code:</label>
                            <select class="form-control {{ $errors->has('serviceCode') ? ' is-invalid' : '' }}" required name="serviceCode" id="serviceCode">
                                @foreach ($servicecodes as $key => $value)
                                <option value="{{$key}}" {{($timesheet->serviceCode == $key) ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('serviceCode')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="duration">Duration:(Hours)</label>
                            <input type="number" min="1" max="15"  class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" id="duration" placeholder="Duration" name="duration" required value="{{$timesheet->duration}}">
                            <div class="invalid-feedback">{{ $errors->first('duration')  }}</div>
                        </div>
                    </div>
                     
                    <div class="col-lg-8">
                        <div class="form-group">
                            @if($timesheet->document)
                            <!--<input type="checkbox"  name="removeworkAuthorization"  /> Remove
                            <p class="font-weight-normal">If you want remove file please check here.</p>      -->                
                            <a href="{{route('timesheetfile', $timesheet->document)}}">{{$timesheet->document}}</a>
                           @endif
                            <label for="document"> Change Work Authorization :</label>
                            <input type="file" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" id="document" placeholder="document" name="document"  value="{{old('document')}}">
                            <div class="invalid-feedback">{{ $errors->first('document')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="note">Note:</label>
                            <textarea class="form-control {{ $errors->has('v') ? ' is-invalid' : '' }}"
                                id="note" name="note" >{{$timesheet->note}}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('note')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary float-right" id="submitForm"><i class="fa fa-magic"></i> Save </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
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
<script type="text/javascript">
    $('input[name="dates"]').daterangepicker();
        $(document).ready(function () {
            $("#addUser").validate();
        });
    </script>
@endsection