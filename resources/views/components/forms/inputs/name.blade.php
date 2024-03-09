<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input name="name" type="text"
           class="form-control {{$errors->get('name') ?  'border-danger ': ''}}"
           id="name" placeholder="Enter Name"
           value="{{$item->name ?? old('name',"Enter Category Name")}}">
    @error('name')<div class="error">{{$message}}</div>@enderror

</div>
