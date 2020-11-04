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
            <a class="link" href="{{ route('admin') }}">Sashtakon</a>
        </div>
        <form id="forgot-form" action="{{ route('admin.reset') }}" method="post">
            <h3 class="m-t-10 m-b-10">Forgot password</h3>
            <p class="m-b-20">Enter your email address below and we'll send you password reset instructions.</p>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" autocomplete="off">
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
@endsection