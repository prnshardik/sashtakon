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
        <form id="forgot-form" action="{{ route('admin.reset') }}" method="post">
            @csrf
            <h3 class="m-t-10 m-b-10">Forgot password</h3>
            <p class="m-b-20">Enter your email address below and we'll send you password reset instructions.</p>
            <div class="form-group">
                <input class="form-control" type="email" name="email" value="{{ @old('email') }}" placeholder="Email" autocomplete="off">
                @error('email')
                    <p class="invalid-feedback" style="display: block;">
                        <strong>{{ $message }}</strong>
                    </p>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-info btn-block" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection

@section('page-scripts')
@endsection

@section('scripts')
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