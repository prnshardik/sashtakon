@extends('admin.layout.app')

@section('title')
    Profile
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.profile') }}">Settings</a>
@endsection

@section('breadcumb_2')
    profile
@endsection

@section('page-styles')
@endsection

@section('styles')
@endsection

@section('content')
	<div class="page-content fade-in-up">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="ibox">
                    <div class="ibox-body text-center">
                        <div class="m-t-20">
                            <img class="img-circle" src="{{ asset('backend/img/admin-avatar.png') }}">
                        </div>
                        <h5 class="font-strong m-b-10 m-t-10">{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</h5>
                        <div class="m-b-20 text-muted">Administrator</div>
                        <div>
                            <a href="{{ route('admin.change.password') }}" class="btn btn-default btn-rounded m-b-5">Chnage Password</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-scripts')
@endsection

@section('scripts')
@endsection