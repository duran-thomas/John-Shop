<div class="form-group">
    <input type="text" class="form-control" {{ isset($disableStockId) && $disableStockId == true ? "disabled":"disable"}} placeholder="Item ID" name="item_ID" id="item_ID">
</div>
<div class="form-group">
    <input type="text" class="form-control" placeholder="Name" name="item_name" id="item_name">
</div>
<div class="form-group">
    <input type="number" class="form-control" placeholder="Price" name="item_price" id="item_price">
</div>
<div class="form-group">
    <input type="number" class="form-control" placeholder="Quantity" name="item_quantity" id="item_quantity">
</div>
<div class="form-group">
    <select name="supplier_ID" id="supplier_ID">
        @foreach ($supplier as $supplier)
            <option value="{{$supplier->id}}">{{$supplier->name}}</option> 
        @endforeach
    </select>
</div>