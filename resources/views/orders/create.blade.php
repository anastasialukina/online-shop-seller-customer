@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('orders.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="product_name">Product name:</label>
        <input type="text" name="product_name" id="product_name" class="form-control">
        or
        <label for="product_id">Product:</label>
        <select name="product_id" id="product_id" class="form-control">
            <option value="" selected></option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="min_price">Price from:</label>
        <input type="number" name="min_price" id="min_price" class="form-control">
    </div>

    <div class="form-group">
        <label for="max_price">Price to:</label>
        <input type="number" name="max_price" id="max_price" class="form-control">
    </div>

    <div class="form-group">
        <label for="product_type">Product type:</label>
        <select name="product_type" id="product_type" class="form-control">
            <option value="new">New</option>
            <option value="used">Used</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Create Order</button>
</form>

