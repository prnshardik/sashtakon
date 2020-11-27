@extends('admin.layout.app')

@section('title')
    ContactUs lists
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.contact.list') }}">ContactUs</a>
@endsection

@section('breadcumb_2')
    View
@endsection

@section('page-styles')
@endsection

@section('styles')
@endsection

@section('content')
	<div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">ContactUs View</div>
                        <a href="{{ route('admin.contact.list') }}" class="btn btn-primary">ContactUs </a>
                    </div>
                    <div class="ibox-body">
                        <div class="col-md-12">
                            <div class="row m-4">
                                <div class="col-sm-4">
                                    <label class="control-label" style="float:right">
                                        <b>Name :</b>
                                    </label> 
                                </div>
                                <div class="col-sm-7">
                                    <div style="float:left;">
                                        {!! $data->name ?? '' !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" style="float:right">
                                        <b>Phone :</b>
                                    </label> 
                                </div>
                                <div class="col-sm-7">
                                    <div style="float:left;">
                                        {!! $data->phone ?? '' !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" style="float:right">
                                        <b>Email :</b>
                                    </label> 
                                </div>
                                <div class="col-sm-7">
                                    <div style="float:left;">
                                        {!! $data->email ?? '' !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" style="float:right">
                                        <b>Subject :</b>
                                    </label> 
                                </div>
                                <div class="col-sm-7">
                                    <div style="float:left;">
                                        {!! $data->subject ?? '' !!}
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label" style="float:right">
                                        <b>Message :</b>
                                    </label> 
                                </div>
                                <div class="col-sm-7">
                                    <div style="float:left;">
                                        {!! $data->message ?? '' !!}
                                    </div>
                                </div>
                            </div>
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