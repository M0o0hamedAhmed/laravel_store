<div class="form-group">
    <label for="">Description</label>
    <input name="description" type="text"
           class="form-control {{$errors->get('description') ?  'border-danger ': ''}}"
           id="description" placeholder="Enter Name"
           value="{{$item->description ?? old('description',"Enter Category description")}}">
    @error('description')<div class="error">{{$message}}</div>@enderror

</div>
