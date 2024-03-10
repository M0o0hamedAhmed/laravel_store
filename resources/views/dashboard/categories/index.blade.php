@extends('admin.layouts.master')
@section('title','Categories')
@push('styles')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{$title}}</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <x-forms.buttons.text.add>Add {{$title}}</x-forms.buttons.text.add>
                </div>
                <!-- /.Data -->
                <x-tables.regular-table><tr id="tableHeaders"></tr></x-tables.regular-table>
                <!-- /.end Data-->

                <!-- Create Or Edit Modal -->
                <x-modals.modal-edit-create :$title></x-modals.modal-edit-create>
                <!-- Create Or Edit Modal -->


                <!--Delete MODAL -->
                <x-modals.modal-delete></x-modals.modal-delete>
                <!-- MODAL CLOSED -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

@endsection
@push('scripts')
@endpush
@push('ajaxCalls')
    <script>
        $(document).ready(function () {
            var columns = [
                {data: 'id', name: 'id'},
                {data: 'image', name: 'image'},
                {data: 'name', name: 'name'},
                {data: 'parent_name', name: 'parent_name'},
                {data: 'description', name: 'description'},
                {data: 'status', name: 'status'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
            columns.map(function (column) {
                $('#tableHeaders').append(`<th>${column.data}</th>`)
            });

            showData('{{route('dashboard.categories.index')}}', columns);

            // Delete Using Ajax
            deleteScript('{{route('dashboard.delete_categories')}}');
            // Add Using Ajax
            showAddModal('{{route('dashboard.categories.create')}}');
            addScript();
            // Add Using Ajax
            showEditModal('{{route('dashboard.categories.edit',':id')}}');
            editScript();
        });




    </script>
@endpush


