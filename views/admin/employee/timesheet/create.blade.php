@extends('admin.layouts.main')

@section('content')

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
                            <label for="dateduration">Select Date:(week)</label>
                            @php 
                            $currentdate = \Carbon\Carbon::now();
                            $currentdate = $currentdate->subDays(7)->format('m/d/Y');
                            @endphp
                           
                            <input type="text" required class="form-control {{ $errors->has('dateduration') ? ' is-invalid' : '' }}" name="dates" value="{{$currentdate}} - {{\Carbon\Carbon::parse()->format('m/d/Y')}}" />
                            <div class="invalid-feedback">{{ $errors->first('dateduration')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="duration">Duration:(Hours)</label>
                            <input type="number" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" id="duration" placeholder="duration" name="duration" required value="{{old('duration')}}">
                            <div class="invalid-feedback">{{ $errors->first('duration')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="document">Document:</label>
                            <input type="file" class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" id="document" placeholder="document" name="document" required value="{{old('document')}}">
                            <div class="invalid-feedback">{{ $errors->first('document')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="assignment">Assignment:</label>
                            <textarea class="form-control {{ $errors->has('assignment') ? ' is-invalid' : '' }}"
                                id="assignment" name="assignment" value="{{old('assignment')}}">{{old('assignment')}}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('assignment')  }}</div>
                        </div>
                    </div>
                    
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary float-right" id="submitForm"> Submit Time Sheet</button>
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
$('input[name="dates"]').daterangepicker();
    $(document).ready(function () {
        $("#addUser").validate();
    });
</script>
@endsection