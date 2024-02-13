<!doctype html>
<html lang="en">
  <head>
    <title>Laravel</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>
  <body>
      <div class="container py-5">
    <h2>LOS ARCHIVOS DEL DUQUE</h2>
    <hr>
    <h4 class="mb-3">Comprobante de Pago</h4>
        <hr>
    <h5>Datos del Cliente</h5>
    <div class="row">
        <p class="col-6">
            Nombre completo: {{ $invoice->user->name }}, {{ $invoice->user->lastname }}
        </p>
        <p class="col-6">
           Número de documento: {{ $invoice->user->document_number }}
        </p>
    </div>
    <div class="row">
        <p class="col-6">
           Fecha: {{ $invoice->date }}
        </p>
        <p class="col-6 ">
            Hora: {{ $invoice->hour }}
        </p>
    </div> 
   
        <hr>
    <h5>Datos del Pedido</h5>
    <div class="row">
        <p class="col-6 ">
            Razón social: Los Archivos del Duque 
        </p>
        <p class="col-6">
           RUC del vendedor: 20108818748 
        </p>
    </div> 
    <div class="row">
        <p class="col-6">
            Tipo de Entrega: Recojo en tienda.
        </p>
        <p class="col-6">
           Dirección: Av. Izaguirre 325, Independencia.
        </p>
    </div>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="product-thumbnail mb-3">Código de Producto</th>
                <th class="product-price mb-3">Nombre del Producto</th>                                         
                <th class="product-subtotal mb-3">Precio de Venta</th>
                <th class="product-subtotal mb-3">Cantidad</th>
                <th class="product-remove mb-3">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalPrice = 0;
            @endphp
        
            @foreach ($invoice->details as $details)
                @php
                    $subtotal = $details->pivot->quantity * $details->sale_price;
                    $totalPrice += $subtotal;
                @endphp
                    
                <tr>
                    <td class="product-name">{{ $details->pivot->product_id }}</td>
                    <td class="product-price"><span class="amount">{{ $details->name }}</span></td> 
                    <td class="product-subtotal"><span class="amount">S/ {{ $details->sale_price }}</span></td>
                    <td class="product-quantity"><span class="amount">{{ $details->pivot->quantity }}</span></td>
                    <td>S/{{ $subtotal }}</td>
                </tr>
            @endforeach
        
            <tr>
                <td colspan="4">Total:</td>
                <td>S/{{ $totalPrice }}</td>
            </tr>
        </tbody>
        
    </table>
</div>

  </body>
</html>
