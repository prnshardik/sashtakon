@extends('admin.layout.app')

@section('title')
    @if(!empty($id))
        Update category
    @else
        Add category
    @endif
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.category.list') }}">Categories</a>
@endsection

@section('breadcumb_2')
    @if(!empty($id))
        Update category
    @else
        Add category
    @endif
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
                        <div class="ibox-title">
                            @if(!empty($id))
                                Update category
                            @else
                                Add category
                            @endif
                        </div>
                        <div class="ibox-title">
                            <a href="{{ route('admin.category.list') }}" class="btn btn-primary btn-sm" >Categories</a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        crud
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