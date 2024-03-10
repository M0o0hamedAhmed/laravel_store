@if(isset($category))
    <form id="updateForm" class="addForm" method="post"
          action="{{route('dashboard.categories.update',$category->id)}}">
        @method('PUT')
        @else
            <form id="addForm" class="addForm" method="post" action="{{route('dashboard.categories.store')}}">
                @endif
                @csrf
                <div class="card-body">
                    <x-forms.inputs.name :item="$category ?? new App\Models\Category"></x-forms.inputs.name>
                    <x-forms.inputs.description :item="$category ?? new App\Models\Category"></x-forms.inputs.description>
                    <x-forms.inputs.single-select :item="$category ?? new App\Models\Category" :items="$categories"></x-forms.inputs.single-select>
                    <x-forms.inputs.image :item="$category ?? new App\Models\Category" :items="$categories"></x-forms.inputs.image>
                    <div class="modal-footer justify-content-between">
                        <x-forms.buttons.text.close></x-forms.buttons.text.close>
                        <x-forms.buttons.text.save></x-forms.buttons.text.save>
                    </div>
                </div>
            </form>
