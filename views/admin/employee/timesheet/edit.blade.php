@extends('admin.layouts.main')

@section('content')

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
                            <label for="dateduration">Select Date:(week)</label>
                            @php 
                            $currentdate = \Carbon\Carbon::now();
                            $currentdate = $currentdate->subDays(7)->format('m d Y');
                            @endphp
                           
                            <input type="text" required class="form-control {{ $errors->has('dateduration') ? ' is-invalid' : '' }}" name="dates" value="{{\Carbon\Carbon::parse($timesheet->fromDate)->format('m/d/Y')}} - {{\Carbon\Carbon::parse($timesheet->toDate)->format('m/d/Y')}}" />
                            <div class="invalid-feedback">{{ $errors->first('dateduration')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="duration">Duration(Hours):</label>
                            <input type="number" class="form-control {{ $errors->has('duration') ? ' is-invalid' : '' }}" id="duration" placeholder="duration" name="duration" required value="{{$timesheet->duration}}">
                            <div class="invalid-feedback">{{ $errors->first('duration')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            @if($timesheet->document)
                            <!--<input type="checkbox"  name="removeworkAuthorization"  /> Remove
                            <p class="font-weight-normal">If you want remove file please check here.</p>      -->                
                            <a href="{{route('timesheetfile', $timesheet->document)}}">{{$timesheet->document}}</a>
                           @endif
                            <label for="document"> Change Work Authorization :</label>
                            <input type="file"   class="form-control {{ $errors->has('document') ? ' is-invalid' : '' }}" id="document" placeholder="" name="document"  >
                            <div class="invalid-feedback">{{ $errors->first('document')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label for="assignment">Assignment:</label>
                            <textarea class="form-control {{ $errors->has('assignment') ? ' is-invalid' : '' }}"
                                id="assignment" name="assignment" >{{$timesheet->assignment}}</textarea>
                            <div class="invalid-feedback">{{ $errors->first('assignment')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary float-right" id="submitForm"><i class="fa fa-magic"></i> Edit User</button>
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