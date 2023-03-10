@if ($orders->count() > 0)
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Min Price</th>
            <th>Max Price</th>
            <th>Type</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id ?? 'Product does not exist'}}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ $order->min_price }}</td>
                <td>{{ $order->max_price }}</td>
                <td>{{ $order->type }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <p>No orders found.</p>
@endif


