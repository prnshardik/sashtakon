@extends('admin.layout.app')

@section('title')
    Categories lists
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.category.list') }}">Categories</a>
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
                        <div class="ibox-title">Categories lists</div>
                        <div class="ibox-title">
                            <a href="{{ route('admin.category.add') }}" class="btn btn-primary btn-sm" >Add Category</a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <table id="data-table" class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
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
        $(function () {
            var table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                "ajax": {
                    "url": "{{ route('admin.category.lists') }}",
                    "type": "POST",
                    "data": {
                        _token: "{{ csrf_token() }}"
                    }
                },
                columns: [
                    {
                        data: 'DT_RowIndex', 
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name', 
                        name: 'name'
                    },
                    {
                        data: 'action', 
                        name: 'action', 
                        orderable: true, 
                        searchable: true
                    }
                ]
            });
            
          });
    </script>

    <script type="text/javascript">
        function delete_record(object){
            var status = $(object).data("status");
            var id = $(object).data("id");
            
            $.ajax({
                "url": "{!! route('admin.category.delete') !!}",
                "dataType": "json",
                "type": "POST",
                "data": {
                    id: id,
                    status: status,
                    _token: "{{csrf_token()}}"
                },
                success: function (response){
                    if(response.status == "success"){
                        list_table_one.ajax.reload(null, false); //reload datatable ajax
                        toastr.success('Deleted successfully', 'Success');
                    }else{
                        toastr.error('something went wrong', 'Error');
                    }
                }
            });
        }
    </script>
@endsection