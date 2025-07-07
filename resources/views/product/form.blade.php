<div class="mb-3">
    <label class="form-label">Product Name *</label>
    <input type="text" name="name" class="form-control"
           value="{{ old('name', $product->name ?? '') }}">

    @error('name')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>

    @error('description')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Price *</label>
    <input type="number" step="0.01" name="price" class="form-control"
           value="{{ old('price', $product->price ?? '') }}">

    @error('price')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Quantity *</label>
    <input type="number" name="quantity" class="form-control"
           value="{{ old('quantity', $product->quantity ?? '') }}">

    @error('quantity')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Status *</label>
    <select name="status" class="form-select">
        <option value="active" {{ old('status', $product->status ?? '') == 'active' ? 'selected' : '' }}>Active</option>
        <option value="in-active" {{ old('status', $product->status ?? '') == 'in-active' ? 'selected' : '' }}>Inactive</option>
    </select>

    @error('status')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Category *</label>
    <select name="category_id" class="form-select">
        <option value="">{{$product->category->name}}</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    @error('category_id')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>

<div class="mb-3">
    <label class="form-label">Product Image</label>
    <input type="file" name="image" class="form-control">

    @if (!empty($product?->image))
        <img src="{{ asset('storage/' . $product->image) }}" width="150" class="mt-2">
    @endif

    @error('image')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
