<form method="POST" action="{{ route('products.store') }}">
    @csrf
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter product name"
               value="{{ old('name') }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="4" class="form-control" id="description"
                  placeholder="Enter product description" required>{{ old('description') }}</textarea>
    </div>
    <div class="form-group">
        <label for="status">Status</label>
        <select name="status" class="form-control" id="status" required>
            <option value="">Select status</option>
            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" name="price" class="form-control" id="price" placeholder="Enter product price"
               value="{{ old('price') }}" required>
    </div>
    <div class="form-group">
        <label for="type">Type</label>
        <select name="type" class="form-control" id="type" required>
            <option value="">Select product type</option>
            <option value="new" {{ old('type') == 'new' ? 'selected' : '' }}>New</option>
            <option value="used" {{ old('type') == 'used' ? 'selected' : '' }}>Used</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
