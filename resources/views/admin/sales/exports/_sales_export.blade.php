<table>

    <thead>
        <tr>
            <th>N°</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Cant. Productos</th>
            <th>Monto de venta</th>
            <th>Ganancia total</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($sales as $sale)
            @php
                $qtty = $sale->details->sum(function ($product) {
                    return $product->pivot->quantity;
                });

                $amount = $sale->details->sum(function ($product) {
                    $unit_price = $product->sale_price;
                    return $unit_price * $product->pivot->quantity;
                });

                $amount = $sale->details->sum(function ($product) {
                    $unit_price = $product->sale_price;
                    return $unit_price * $product->pivot->quantity;
                });

                $purchase_price = $sale->details->sum(function ($product) {
                    $unit_price = $product->purchase_price;
                    return $unit_price * $product->pivot->quantity;
                });
            @endphp

            <tr>
                <td> {{ $sale->id }} </td>
                <td> {{ $sale->user->full_name }} </td>
                <td> {{ $sale->date }} </td>
                <td> {{ $sale->hour }} </td>
                <td> {{ $qtty }} </td>
                <td> {{ 'S/.'. round($amount, 2) }} </td>
                <td> {{ 'S/.'. round(($amount - $purchase_price), 2) }} </td>
            </tr>
        @endforeach

    </tbody>

</table>
