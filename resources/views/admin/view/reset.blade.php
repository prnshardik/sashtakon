@extends('admin.layout.auth.app')

@section('title')
    Login
@endsection

@section('page-styles')
@endsection

@section('styles')
@endsection

@section('content')
    <div class="content">
        <div class="brand">
            <a class="link" href="{{ route('admin') }}">{{ _setting('site_title') }}</a>
        </div>
        @if(isset($data) && !empty($data))
            @if($data['code'] == '200')
                <div class="woocommerce">
                    <div class="woocommerce-notices-wrapper"></div>
                    <form action="{{ route('admin.password_reset') }}" method="post" id="reset_password" class="woocommerce-ResetPassword lost_reset_password">
                        @csrf
                        <p>Reset password, Please enter your password and confirm password to reset password.</p>
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label for="email">Username or email</label>
                            <input type="text" name="email" id="email" value="{{ $data['data'] }}" disabled="disabled" class="woocommerce-Input woocommerce-Input--text input-text" autocomplete="username" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                            <input type="hidden" name="id" value="{{ $data['id'] }}">
                        </p>
                        @error('email')
                            <p class="invalid-feedback" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label for="password">New Password</label>
                            <input type="text" name="password" id="password" class="woocommerce-Input woocommerce-Input--text input-text" autocomplete="username" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </p>
                        @error('password')
                            <p class="invalid-feedback" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                        <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                            <label for="confirm_password">Confirm Password</label>
                            <input type="text" name="confirm_password" id="confirm_password" class="woocommerce-Input woocommerce-Input--text input-text" autocomplete="username" style="background-image: url(&quot;data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAASCAYAAABSO15qAAAAAXNSR0IArs4c6QAAAPhJREFUOBHlU70KgzAQPlMhEvoQTg6OPoOjT+JWOnRqkUKHgqWP4OQbOPokTk6OTkVULNSLVc62oJmbIdzd95NcuGjX2/3YVI/Ts+t0WLE2ut5xsQ0O+90F6UxFjAI8qNcEGONia08e6MNONYwCS7EQAizLmtGUDEzTBNd1fxsYhjEBnHPQNG3KKTYV34F8ec/zwHEciOMYyrIE3/ehKAqIoggo9inGXKmFXwbyBkmSQJqmUNe15IRhCG3byphitm1/eUzDM4qR0TTNjEixGdAnSi3keS5vSk2UDKqqgizLqB4YzvassiKhGtZ/jDMtLOnHz7TE+yf8BaDZXA509yeBAAAAAElFTkSuQmCC&quot;); background-repeat: no-repeat; background-attachment: scroll; background-size: 16px 18px; background-position: 98% 50%; cursor: auto;">
                        </p>
                        @error('confirm_password')
                            <p class="invalid-feedback" style="display: block;">
                                <strong>{{ $message }}</strong>
                            </p>
                        @enderror
                        <div class="clear"></div>
                        <p class="woocommerce-form-row form-row">
                            <button type="submit" class="woocommerce-Button button" value="Reset password">Reset password</button>
                        </p>
                    </form>
                </div>
            @else
                <p>Something went wrong.</p>
            @endif
        @else
            <p>Something went wrong.</p>
        @endif
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('backend/js/jquery-validation/jquery.validate.js') }}"></script>
    <script src="{{ asset('backend/js/jquery-validation/additional-methods.js') }}"></script>
@endsection

@section('scripts')
    <script type="text/javascript">
        jQuery(document).ready(function(){
            jQuery("#reset_password").validate({
                errorElement: "div", // contain the error msg in a span tag
                errorClass: 'invalid-feedback',
                errorPlacement: function (error, element) { // render error placement for each input type
                    error.insertAfter(element);
                },
                ignore: "",
                rules: {
                    email: {
                        required: true,
                        email: true,
                        normalizer: function(value) {
                            this.value = jQuery.trim(value);
                            return this.value;
                        }
                    },
                    password: {
                        required: true,
                        minlength : 7
                    },
                    confirm_password: {
                        required: true,
                        minlength : 7,
                        equalTo : "#password"
                    }
                },
                messages: {
                    email: {
                        required: "Please enter email.",
                        email: "Please enter valid email."
                    },
                    password: {
                        required: 'Please enter new password.',
                        minlength: 'Password length should be 7 character'
                    },
                    confirm_password: {
                        required: 'Please enter confirm password.',
                        minlength: 'Password length should be 7 character',
                        equalTo: "confirm password must be same as new password"
                    }
                },
                invalidHandler: function (event, validator) { //display error alert on form submit
                    //successHandler1.hide();
                    //errorHandler1.show();
                },
                highlight: function (element) {
                    jQuery(element).closest('.help-block').removeClass('valid');
                    jQuery(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    jQuery(element).closest('.form-group').removeClass('has-error');
                },

                success: function (label, element) {
                    label.addClass('help-block valid');
                    jQuery(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
                }
                // submitHandler: function (frmadd) {
                //     // debugger;
                //     successHandler1.show();
                //     errorHandler1.hide();
                // }
            });
        });
    </script>
    <script>
        var success = "{{ session()->has('success') ? session()->get('success') : '' }}";
        var error = "{{ session()->has('error') ? session()->get('error') : '' }}";
        
        if (success.length > 0) {
            toastr.success(success, 'Success');
        }
        
        if (error.length > 0) {
            toastr.error(error, 'Error');
        }
    </script>
@endsection