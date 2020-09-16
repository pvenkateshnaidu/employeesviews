
@extends('admin.layouts.main')

@section('content')
@php
$i  = 1 + (1 * (($users->currentPage() * config('wallet.resultsPerPage')) - config('wallet.resultsPerPage')));

$visatype  = config('wallet.visaType');
$status = config('wallet.rstatus');
@endphp
<div class="container-fluid">
    @if (session('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Success!</strong> {{ session('message') }}
    </div>    
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h2 class="text-center">Consultants Daily Reports</h2>
        </div>
      
       
    </div>   
      
 

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                       <th>Date</th>
                    <th>Consultant Name</th>
                    <th>Vendor Status</th>  
                    <th  style="width: 100%;">Phone number</th>   

                    <th>Technology </th>     
                    <th>Rate</th>     
                    <th>Visa Type</th>     
                    <th>City</th>     
                    <th>State</th>     
                    <th>Experience</th>   
                    <th>Willing to Relocate</th>    
                    <th>Status</th>     
                    <th>Comments</th>                  
                    <th>Actions</th>
                </tr>
            </thead>
            <tfoot>
               
            </tfoot>
            <tbody>
         
                @foreach ($users as $journal)
              @php
               $url=url('admin/vendors/'.$journal->vendorId.'/edit');
                @endphp
                <tr>
                    <td>{{ $i }}</td>
                   <td>{{ \Carbon\Carbon::parse($journal->created_at)->format('d/m/Y h:i:sa') }}</td>
                     <td>{{ $journal->consultatName }}</td>
                     <th>{{ ($journal->vendorName?'Added':'  -  ') }}
                        </th>
                       <td>{{ $journal->consultatMobileNumber }}</td>
                         <td>{{ $journal->technology }}</td>
                           <td>{{ $journal->rate }}</td>                            
                               <td>{{ $journal->visaType }}</td>
                                 <td>{{ $journal->city }}</td>
                                   <td>{{ $journal->state }}</td>
                                    <td>{{ $journal->experience }}</td>
                                    
                                           <td>{{ $journal->willingLocation}}</td>
                                           <td>{{ $journal->reportStatus }}</td>
                    <td>{{ $journal->comments }}</td>
                   
                    <td>
                        @if( $journal->adminStatus == 'A' )
                        <a href="{{ $journal->reportId.'/D' }}" class="btn btn-circle btn-sm btn-danger updateStatus" data-toggle="tooltip" title="Un publish"><i class="fa fa-thumbs-down"></i></a>
                      
                        @else
                        <a href="{{ $journal->reportId.'/A' }}" class="btn btn-circle btn-sm btn-primary updateStatus" data-toggle="tooltip" title="Publish"><i class="fa fa-thumbs-up"></i></a>
                        @endif
                 
                       
                          <a href="{{\url('admin/userreports/'.$journal->reportId.'/edit')}}" class="btn btn-circle btn-sm btn-primary" data-toggle="tooltip" title="Edit Consultant Details "><i class="fa fa-magic"></i></a> 
                       
                    </td>
                </tr>
                @php $i++ @endphp
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection

@section('addonJsScript')
<script src="{{ asset('dashboard/js/common.js')}}"></script>        

<script type="text/javascript">


       $(document).ready(function () {
        $('.updateStatus').click(function (e) {
            e.preventDefault();
            console.log($(this).attr('href'));
            var input = $(this).attr('href').split("/");
            console.log(input);

            var status = 'Publish';

            if (input[1] == 'D') {
                status = 'Un publish';
            }

            swal({
                title: "Admin going to " + status + ' Consultant',
                text: "Submit to update Status",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                var url = '{{url("api/updateAdminStatus")}}';
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
   $( "#reset-btn" ).click(function() {
         $('#name').val('').change();
    
      $('#user_status').val('').change();
    
    
    });
    
</script>
@endsection

