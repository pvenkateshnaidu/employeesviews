@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
    <div class="card">               
        <div class="card-body">
            <h2>Change Password</h2>
            <form action="{{ url('admin/updatepassword/'.$id) }}" id="addUser" method="post" >
                <div class="row">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}" id="current_pass" placeholder="Enter Current Password" name="current_pass" required>
                            <div class="invalid-feedback">{{ $errors->first('current_pass')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="new_pass">New Password:</label>
                            <input type="password" class="form-control {{ $errors->has('new_pass') ? ' is-invalid' : '' }}" id="new_pass" placeholder="Enter New Password" name="new_pass" required >
                            <div class="invalid-feedback">{{ $errors->first('new_pass')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="confirm_pass">Confirm New Password:</label>
                            <input type="password" class="form-control {{ $errors->has('confirm_pass') ? ' is-invalid' : '' }}" id="confirm_pass" placeholder="Confirm New Password" name="confirm_pass" required >
                            <div class="invalid-feedback">{{ $errors->first('confirm_pass')  }}</div>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <p>&nbsp;</p>
                            <button type="submit" class="btn btn-primary float-right" id="submitForm"><i class="fa fa-key"></i> Change Password</button>
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
        $("#addUser").validate({
            rules: {
                current_pass: {
                    required: true
                },
                new_pass: {
                    required: true,
                    minlength: 8
                },
                confirm_pass: {
                    required: true,
                    minlength: 8,
                    equalTo: '#new_pass'
                }
            },
            messages: {
                current_pass: {
                    required: "Please enter Password",
                    minlength: "Password must consist of at least 8 Charecters"
                },
                new_pass: {
                    required: "Please enter new Password",
                    minlength: "Password must consist of at least 8 Charecters"
                },
                confirm_pass: {
                    required: "Please confirm new password",
                    minlength: "Password must consist of at least 8 Charecters",
                    equalTo: 'Confirm password should be same as New Password'
                }
            },
            errorElement: "em",
            errorPlacement: function (error, element) {
                // Add the `invalid-feedback` class to the error element
                error.addClass("invalid-feedback");
                if (element.prop("type") === "checkbox") {
                    error.insertAfter(element.next("label"));
                } else {
                    error.insertAfter(element);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            }
        });
    });
</script>
@endsection