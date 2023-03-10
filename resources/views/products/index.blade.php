<button type="button" class="btn btn-primary">
    <a href="{{ route('orders.create') }}">Create Order</a>
</button>
@foreach ($products as $product)
    <div class="product">
        <h2>{{ $product->name }}</h2>
        <p>{{ $product->description }}</p>
        <p>Price: {{ $product->price }}</p>
        @if ($product->image)
            <img src="{{ $product->image }}" alt="{{ $product->name }}">
        @else
            <img src="/storage/images/placeholder.jpeg" alt="Placeholder">
        @endif
    </div>
@endforeach
