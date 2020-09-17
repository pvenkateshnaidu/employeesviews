@extends('admin.layouts.main')

@section('content')
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
        <div class="col-lg-6">
            <a class="btn btn-primary float-right" href="{{url('timesheet/create')}}"><i class="fa fa-timesheet-plus"></i> Add timesheet</a>
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
                    <th>Note</th>
                    <th>Document</th>
                    <th>Created At</th>  
                    <th>Action</th>                
                </tr>
            </thead>
         
            <tbody>
                @php
                $i  = 1 + (1 * (($timesheets->currentPage() * config('wallet.resultsPerPage')) - config('wallet.resultsPerPage')));
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
                    <td>{{ $timesheet->note }}</td>     
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
        {{ $timesheets->links() }}
    </div>
</div>
@endsection

@section('addonJsScript')
<script src='{{ asset("dashboard/js/common.js")}}'></script>        

<script type="text/javascript">

    $(document).ready(function () {
        $('.updateStatus').click(function (e) {
            e.preventDefault();
            console.log($(this).attr('href'));
            var input = $(this).attr('href').split("/");
            console.log(input);

            var status = 'Active';

            if (input[1] == 'B') {
                status = 'Block';
            }

            swal({
                title: "timesheet going to " + status + ' timesheet',
                text: "Submit to update Status",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                var url = '{{url("api/updatetimesheetstatus")}}';
                var type = 'post';

                var data = {
                    'id': input[0],
                    'status': input[1],
                    '_token': '{{ csrf_token() }}'
                };
                var headers = {
                    '_token': '{{ csrf_token() }}',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                };
                var result = ajaxRequest(url, type, data, headers);
               
            });
        });
       
    });
    (function( $ ){
      var availableTags =@json('');
        
          $(".autocomplete").autocomplete({
            source: availableTags.names
          });
           $(".emailautocomplete").autocomplete({
            source: availableTags.emails
          });
           })( jQuery );
</script>
@endsection