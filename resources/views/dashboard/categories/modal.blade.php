<div class="modal-body">
    <form id="addForm" class="addForm" method="post" enctype="multipart/form-data"
          action="{{route('dashboard.categories.store')}}">
        <div class="card-body">
            <x-forms.inputs.name></x-forms.inputs.name>
            <x-forms.inputs.single-select :items="$categories"></x-forms.inputs.single-select>
            <div class="modal-footer justify-content-between">
                <x-forms.buttons.text.close></x-forms.buttons.text.close>
                <x-forms.buttons.text.save></x-forms.buttons.text.save>
            </div>
        </div>
    </form>
</div>
