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
                            <li class="nav-item">
                                <a class="nav-link" href="#logo" data-toggle="tab">Second</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="general">
	                            @for($i = 0; $i < 5; $i++)	
	                            	<div class="form-group">
	                                    <label>Key</label>
	                                    <input type="text" name="key" class="form-control" placeholder="key">
	                                </div>
	                            @endfor
								<div class="form-group row">
                                    <div class="col-sm-12 mt-3 ml-2">
                                        <button class="btn btn-info" type="submit">Update</button>
                                    </div>
                                </div>
                           	</div>
                            <div class="tab-pane" id="logo">
                            	Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica.
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