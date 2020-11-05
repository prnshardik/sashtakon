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
        <form id="login-form" action="{{ route('admin.signin') }}" method="post">
            @csrf
            <h2 class="login-title">Log in</h2>
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-envelope"></i></div>
                    <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="input-group-icon right">
                    <div class="input-icon"><i class="fa fa-lock font-16"></i></div>
                    <input class="form-control" type="password" name="password" placeholder="Password">
                    @if($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
            </div>
            <div class="form-group d-flex justify-content-between">
                <!-- <label class="ui-checkbox ui-checkbox-info"> -->
                    <!-- <input type="checkbox"> -->
                    <!-- <span class="input-span"></span>Remember me</label> -->
                <a href="{{ route('admin.forget') }}">Forgot password?</a>
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Login</button>
            </div>
        </form>
    </div>
@endsection

@section('page-scripts')
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
@endsection