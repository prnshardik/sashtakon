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
@endsection

@section('scripts')
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
                }
            },
            messages: {
                name: {
                    required: 'Please enter name.'
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