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
            <h2>Users list</h2>
        </div>
        <div class="col-lg-6">
            <a class="btn btn-primary float-right" href="{{url('user/create')}}"><i class="fa fa-user-plus"></i> Add User</a>
        </div>
    </div>       
    <!-- <form  action="{{ url('admin/user/') }}" method="get" autocomplete="off">
        {{ csrf_field() }}
        <div class="form-group row">
            <div class="col-lg-2">
                <label for="name">Full Name:</label>
                <input type="text" class="autocomplete form-control" id="name" name="name">
            </div>
            <div class="col-lg-3">
                <label for="email">Email:</label>
                <input type="text" class="emailautocomplete form-control" id="email" name="email">
            </div>
            <div class="col-lg-3">
                <label for="user_type">User Type:</label>
                <select class="form-control" name="user_type" id="user_type">
                    <option value="">-- Select User Type --</option>
                    <option value="A">Admin</option>
                    <option value="S">Super Admin</option>
                    <option value="U">User</option>
                </select>
            </div>
            <div class="col-lg-3">
                <label for="user_status">Status:</label>
                <select class="form-control" name="user_status" id="user_status">
                    <option value="">-- Select Status --</option>
                    <option value="A">Active</option>
                    <option value="B">Blocked</option>
                </select>
            </div>
            <div class="col-lg-1">               
                <label for="submit">&nbsp;</label><br/>
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form> -->

    <div class="table-responsive">
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>User Type</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>
         
            <tbody>
                @php
                $i  = 1 + (1 * (($users->currentPage() * config('wallet.resultsPerPage')) - config('wallet.resultsPerPage')));
                $userType = config('wallet.userTypes');
                $status = config('wallet.userStatus');
                @endphp
                @foreach ($users as $user)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $userType[$user->user_type] }}</td>
                    <td>{{ $status[$user->user_status] }}</td>
                    <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d F Y H:i:s') }}</td>
                    <td>
                        @if( $user->user_status === 'A' )
                        <a href="{{ $user->id.'/B' }}" class="btn btn-circle btn-sm btn-danger updateStatus" data-toggle="tooltip" title="Block User"><i class="fa fa-thumbs-down"></i></a>
                        <a href="{{\url('user/'.$user->id.'/edit')}}" class="btn btn-circle btn-sm btn-success" data-toggle="tooltip" title="Edit User Info"><i class="fa fa-magic"></i></a>
                        @else
                        <a href="{{ $user->id.'/A' }}" class="btn btn-circle btn-sm btn-primary updateStatus" data-toggle="tooltip" title="Activate User"><i class="fa fa-thumbs-up"></i></a>
                        @endif
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
                title: "User going to " + status + ' user',
                text: "Submit to update Status",
                type: "warning",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function () {
                var url = '{{url("api/updateUserStatus")}}';
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