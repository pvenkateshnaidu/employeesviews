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