<div class="form-group">
    <label>Items</label>
    <select class="form-control form-select  select2bs4" style="width: 100%;" name="parent_id" >
        <option value="">Primary Category</option>
        @foreach($items as $_item)
            <option {{$item->parent_id == $_item->id ? 'selected' : ''}}  value="{{$_item->id}}">{{$_item->name}}</option>
        @endforeach
    </select>
</div>

