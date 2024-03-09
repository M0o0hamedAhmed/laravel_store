@extends('admin.layouts.master')
@section('title','Categories')
@push('styles')
@endpush
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Categories</li>
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <x-forms.buttons.text.add>Add Category</x-forms.buttons.text.add>
                </div>
                <!-- /.Data -->
                <div class="card-body">
                    <table id="dataTable" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>

                    </table>
                </div>
                <!-- /.end Data-->

                <!-- Create Or Edit Modal -->
                <div class=" modal fade" id="editOrCreate">
                    <div class="modal-dialog modal-xl"> {{--modal-xl  modal-lg modal-sm--}}
                        <div
                            class="modal-content"> {{--bg-success  bg-danger bg-warning bg-info bg-secondary bg-primary--}}
                            <div class="modal-header">
                                <h4 class="modal-title">Create User</h4>
                                <x-forms.buttons.icons.close></x-forms.buttons.icons.close>
                            </div>
                            <div class="modal-body" id="modal-body">

                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- Create Or Edit Modal -->


                <!--Delete MODAL -->
                <div class="modal fade" id="delete_modal" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">حذف بيانات</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <input id="delete_id" name="id" type="hidden">
                                <p>هل انت متأكد من حذف البيانات التالية <span id="title" class="text-danger"></span>؟
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"
                                        id="dismiss_delete_modal">
                                    اغلاق
                                </button>
                                <button type="button" class="btn btn-danger" id="delete_btn">حذف !</button>
                            </div>
                        </div>
                    </div>
                </div>
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
        var columns = [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'status', name: 'status'},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
        showData('{{route('dashboard.categories.index')}}', columns);
        // Delete Using Ajax
        deleteScript('{{route('dashboard.delete_categories')}}');
        // Add Using Ajax
        showAddModal('{{route('dashboard.categories.create')}}');
        addScript();
        // Add Using Ajax
        showEditModal('{{route('dashboard.categories.edit',':id')}}');
        editScript();
    </script>
@endpush


