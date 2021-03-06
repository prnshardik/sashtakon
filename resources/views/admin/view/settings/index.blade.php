@extends('admin.layout.app')

@section('title')
    Settings
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.setting') }}">Settings</a>
@endsection

@section('breadcumb_2')
    Index
@endsection

@section('page-styles')
    <link href="{{ asset('backend/css/dropify.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/sweetalert2.bundle.css') }}" rel="stylesheet">
@endsection

@section('styles')
@endsection

@section('content')
	<div class="page-content fade-in-up">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Settings</div>
                    </div>
                    <div class="ibox-body">
                        <ul class="nav nav-tabs nav-fill">
                            <li class="nav-item">
                                <a class="nav-link active" href="#general" data-toggle="tab">General</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="#smtp" data-toggle="tab">SMTP</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="#logo" data-toggle="tab">Logo</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="general">
        	                    <form action="{{ route('admin.setting.update') }}" method="post">
                                    @csrf
                                    @if(!empty($generals))
                                        @foreach($generals as $row)	
        	                            	<div class="form-group">
        	                                    <label>{{ ucwords(str_replace('_', ' ', $row['key'])) }}</label>
        	                                    <input type="text" name="{{ $row['id'] }}" id="{{ $row['key'] }}" class="form-control" value="{{ $row['value'] }}" placeholder="{{ $row['key'] }}">
        	                                </div>
        	                            @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="mt-5">No Dat Found...!!!</h3>
                                            </div>
                                        </div>
                                    @endif
    								<div class="form-group row">
                                        <div class="col-sm-12 mt-3 ml-2">
                                            <button class="btn btn-info" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                           	</div>
                            <!-- <div class="tab-pane" id="smtp">
                            	<form action="{{ route('admin.setting.update') }}" method="post">
                                    @csrf
                                    @if(!empty($smtps))
                                        @foreach($smtps as $row) 
                                            <div class="form-group">
                                                <label>{{ ucwords(str_replace('_', ' ', $row['key'])) }}</label>
                                                <input type="text" name="{{ $row['id'] }}" id="{{ $row['key'] }}" class="form-control" value="{{ $row['value'] }}" placeholder="{{ $row['key'] }}">
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="mt-5">No Dat Found...!!!</h3>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-sm-12 mt-3 ml-2">
                                            <button class="btn btn-info" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                            <div class="tab-pane" id="logo">
                                <form action="{{ route('admin.setting.logo.update') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @if(!empty($logos) && isset($logos) && count($logos) > 0)
                                        @foreach($logos as $row)
                                            <div class="col-sm-12 mb-3">
                                                <label for="{{ $row['key'] }}">{{ ucwords(str_replace('_', ' ', $row['key'])) }}</label>
                                                <div class="input-group">
                                                    <input type="file" name="{{ $row['key'] }}" class="form-control dropify" id="{{ $row['key'] }}" data-default-file="{{ $row['value'] ?? '' }}" data-show-remove="false" >
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3 class="mt-5">No Dat Found...!!!</h3>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group row">
                                        <div class="col-sm-12 mt-3 ml-2">
                                            <button class="btn btn-info" type="submit">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-scripts')
    <script src="{{ asset('backend/js/dropify.min.js') }}"></script>
    <script src="{{ asset('backend/js/promise.min.js') }}"></script>
    <script src="{{ asset('backend/js/sweetalert2.bundle.js') }}"></script>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            $('.dropify').dropify();
        });
    </script>
@endsection