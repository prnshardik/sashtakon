@extends('admin.layout.app')

@section('title')
    @if(!empty($id))
        Update product
    @else
        Add product
    @endif
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.product.list') }}">Products</a>
@endsection

@section('breadcumb_2')
    @if(!empty($id))
        Update product
    @else
        Add product
    @endif
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
                        <div class="ibox-title">
                            @if(!empty($id))
                                Update product
                                @php $formAction = route('admin.product.update', $id); @endphp
                            @else
                                Add product
                                @php $formAction = route('admin.product.insert'); @endphp
                            @endif
                        </div>
                        <div class="ibox-title">
                            <a href="{{ route('admin.product.list') }}" class="btn btn-primary btn-sm" >Products</a>
                        </div>
                    </div>

                    <div class="ibox-body">
                        <form action="{{ $formAction }}" method="post" id="crud_form" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ @old('name', $data->name) }}" placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Sort Description</label>
                                <input type="text" name="sort_description" id="sort_description" class="form-control" value="{{ @old('sort_description', $data->sort_description) }}" placeholder="Name">
                                @error('sort_description')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea id="description" name="description" class="form-control" >{{ @old('description', $data->description) }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">select category</option>
                                    @if($categories->isNotEmpty())
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}" @if(isset($data) && $data->category_id == $row->id) selected @endif>{{ $row->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('category_id')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Is Featured Image</label>
                                <select name="is_featured" id="is_featured" class="form-control">
                                    <option value="N" @if(isset($data) && $data->is_featured == 'N') selected @endif>No</option>
                                    <option value="Y" @if(isset($data) && $data->is_featured == 'Y') selected @endif>Yes</option>
                                </select>
                                @error('is_featured')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control dropify" data-default-file="{{ $data->image ?? '' }}" data-show-remove="false">
                                @error('image')
                                    <span class="invalid-feedback" style="display: block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" type="submit">Save</button>
                                <a href="{{ route('admin.product.list') }}" class="btn btn-danger float-right">Cancel</a>
                            </div>
                        </form>
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
        $('.dropify').dropify();
    </script>

    <script type="text/javascript">
        $("#crud_form").validate({
            errorElement: "div",
            errorClass: 'invalid-feedback',
            errorPlacement: function (error, element){
                error.insertAfter(element);
            },
            ignore: "",
            rules: {
                name: {
                    required: true
                },
                sort_description: {
                    required: true
                },
                description: {
                    required: true
                },
                category_id: {
                    required: true
                }
            },
            messages: {
                name: {
                    required: 'Please enter name.'
                },
                sort_description: {
                    required: 'Please enter sort description.'
                },
                description: {
                    required: 'Please enter description.'
                },
                category_id: {
                    required: 'Please select category.'
                }
            },
            invalidHandler: function (event, validator){
                //successHandler1.hide();
                //errorHandler1.show();
            },
            highlight: function (element){
                $(element).closest('.help-block').removeClass('valid');
                $(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
            },
            unhighlight: function (element){
                $(element).closest('.form-group').removeClass('has-error');
            },
            success: function (label, element){
                label.addClass('help-block valid');
                $(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
            },
            submitHandler: function (frmadd){
                successHandler1.show();
                errorHandler1.hide();
            }
        });
    </script>
@endsection