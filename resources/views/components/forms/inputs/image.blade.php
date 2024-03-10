<div class="form-group">
    <div>
        <label for="formFileLg" class="form-label">Large file input example</label>
        <input name="image" accept="image/png, image/jpeg"
               class="form-control form-control-lg"  type="file" value="{{$item->image}}">
    </div>
    @error('image') <div class="error">{{$message}}</div>@enderror


{{--    @if($image && !$editMode)--}}
{{--        <img class="rounded w-10 h-10 mt-5 block" src="{{$image->temporaryURL()}}">--}}
{{--    @endif--}}
{{--    @include('livewire/include/overlay-loading/overlay')--}}
</div>
