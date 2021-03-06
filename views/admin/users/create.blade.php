@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">               
        <div class="card-body">
            <h2>Add User</h2>
            <form action="{{ url('user/') }}" id="addUser" method="post" >
                <div class="row">
                    {{ csrf_field() }}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="name">Full Name:</label>
                            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="fullName" placeholder="Enter Full Name" name="name" required value="{{old('name')}}">
                            <div class="invalid-feedback">{{ $errors->first('name')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" placeholder="Enter Email Address" name="email" required value="{{old('email')}}">
                            <div class="invalid-feedback">{{ $errors->first('email')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="technology">Assign Technology:</label>
                            <input type="text" class="form-control {{ $errors->has('technology') ? ' is-invalid' : '' }}" id="technology" placeholder="Enter Technology" name="technology" required value="{{old('technology')}}">
                            <div class="invalid-feedback">{{ $errors->first('technology')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="email" placeholder="Enter Password" name="password" required>
                            <div class="invalid-feedback">{{ $errors->first('password')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="userType">User Type:</label>
                            <select class="form-control {{ $errors->has('userType') ? ' is-invalid' : '' }}" required name="userType" id="userType">
                                @foreach ($userTypes as $key => $value)
                                <option value="{{$key}}" {{(old('userType') == $key) ? 'selected' : '' }}>{{$value}}</option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">{{ $errors->first('gender')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary float-right" id="submitForm"><i class="fa fa-plus"></i> Add User</button>
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