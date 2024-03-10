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
                <p>هل انت متأكد من حذف البيانات التالية <span id="title" class="text-danger"></span>؟</p>
            </div>
            <div class="modal-footer">
                <x-forms.buttons.text.close>اغلاق</x-forms.buttons.text.close>
                <x-forms.buttons.text.delete>حذف !</x-forms.buttons.text.delete>
            </div>
        </div>
    </div>
</div>
