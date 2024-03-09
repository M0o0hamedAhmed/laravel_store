<div class="form-group">
    <label>Items</label>
    <select class="form-control select2bs4" style="width: 100%;" name="category_id" required>
        <option value="null">Primary Category</option>
        @foreach($items as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>

