@extends('admin.layout.app')

@section('title')
    Notifications lists
@endsection

@section('breadcumb_1')
    <a href="{{ route('admin.notification.list') }}">Notifications</a>
@endsection

@section('breadcumb_2')
    Lists
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
                        <div class="ibox-title">Notifications Lists</div>
                    </div>
                    <div class="ibox-body">
                        <table id="data-table" class="table table-bordered yajra-datatable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Notification</th>
                                    <th>Link</th>
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
        var data_table;
        $(document).ready(function(){
            if($('#data-table').length > 0){
                data_table = $('#data-table').DataTable({
                    processing: true,
                    serverSide: true,
                    "responsive": true,
                    "aaSorting": [],
                    "ajax": {
                        "url": "{{ route('admin.notification.lists') }}",
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
                            data: 'notification', 
                            name: 'notification'
                        },
                        {
                            data: 'link', 
                            name: 'link'
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
    </script>
@endsection