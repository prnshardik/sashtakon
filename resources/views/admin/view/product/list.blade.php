@extends('admin.layout.app')

@section('title')
    Products lists
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.product.list') }}">Products</a>
@endsection

@section('breadcumb_2')
    lists
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
                        <div class="ibox-title">Products lists</div>
                        <div class="ibox-title">
                            <a href="{{ route('admin.product.add') }}" class="btn btn-primary btn-sm" >Add Product</a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table id="data-table" class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Action</th>
                                    <th>Category</th>
                                    <th>Is Featured Product</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
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
        var data_table;
        $(document).ready(function(){
            if($('#data-table').length > 0){
                data_table = $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    "responsive": true,
                    "aaSorting": [],
                    "ajax": {
                        "url": "{{ route('admin.product.lists') }}",
                        "type": "POST",
                        "data": {
                            _token: "{{ csrf_token() }}"
                        }
                    },
                    "columnDefs": [
                        {
                            "targets": [0], //first column / numbering column
                            "orderable": false, //set not orderable
                        },
                    ],
                    columns: [
                        {
                            data: 'DT_RowIndex', 
                            name: 'DT_RowIndex',
                            orderable: false,
                            sortable:false
                        },
                        {
                            data: 'name', 
                            name: 'name'
                        },
                        {
                            data: 'category_name', 
                            name: 'category_name'
                        },
                        {
                            data: 'is_featured', 
                            name: 'is_featured'
                        },
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: true, 
                            searchable: true
                        }
                    ]
                });    
            }
        });

        function delete_record(object){
            var id = $(object).data("id");
            
            $.ajax({
                "url": "{!! route('admin.product.delete') !!}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    id: id,
                    _token: "{{csrf_token()}}"
                },
                success: function (response){
                    if(response.code == "200"){
                        data_table.ajax.reload(null, false); //reload datatable ajax
                        toastr.success('Deleted successfully', 'Success');
                    }else{
                        toastr.error('something went wrong', 'Error');
                    }
                }
            });
        }
    </script>
@endsection