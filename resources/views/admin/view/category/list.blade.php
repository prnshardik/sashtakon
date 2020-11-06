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
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
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
@endsection