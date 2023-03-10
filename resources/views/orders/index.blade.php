<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }

    td {
        text-align: center;
    }
</style>


@if ($orders != null && count($orders) > 0)
    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Product ID</th>
            <th>Product name</th>
            <th>Min Price</th>
            <th>Max Price</th>
            <th>Type</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->product_id ?? 'Product does not exist'}}</td>
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


