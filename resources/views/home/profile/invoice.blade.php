<!doctype html>
<html lang="en">
<head>
    <title>Los Archivos del Duque - Boleta de Compra</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Garamond', serif; /* Fuente estilo feudal */
            background-color: #ffffff; /* Color de fondo */
            color: #000000; /* Color del texto principal */
        }
        
        h2, h4 {
            color: #000000; /* Color del título */
            text-align: center; /* Alinear al centro */
        }
        hr {
            border-color: #000000; /* Color de la línea divisoria */
            margin-top: 20px; /* Espaciado superior */
            margin-bottom: 20px; /* Espaciado inferior */
        }
        th, td {
            color: #000000; /* Color del texto de las celdas */
        }
        .table {
            margin-bottom: 0; /* Eliminar el espacio inferior de la tabla */
        }
        .product-name {
            font-weight: bold; /* Texto en negrita para el nombre del producto */
            color: #000000; /* Color negro para el nombre del producto */
        }
        .amount {
            color: #000000; /* Color negro para los precios */
            font-weight: bold; /* Texto en negrita para los precios */
        }
        .label {
            font-weight: bold;
            margin-right: 10px; /* Espaciado derecho entre la etiqueta y el valor */
        }

        .row {
            display: flex;
            flex-wrap: wrap; /* Para que los elementos se envuelvan en varias líneas si no caben */
        }

        .col-6 {
            flex: 0 0 50%; /* Ocupa el 50% del ancho disponible */
            max-width: 50%; /* Limita el ancho al 50% */
            padding-right: 15px; /* Espaciado derecho */
            padding-left: 15px; /* Espaciado izquierdo */
        }

        p {
            margin-bottom: 10px; /* Espaciado inferior entre párrafos */
        }
        .float-start{
            float: left;
        }
        .mb{
            margin-bottom: 220px;
        }
        .img-header{
            width: 100%;
            height: 200px;
           
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div>
            <img src="assets/customer/img/logo/LOGOO.png" class="img-header" alt="">
        </div> 
        <hr>
        <h4 class="mb-3">Comprobante de Pago</h4>
        <hr>
        
    <div class="row mb">
        <div class="col-6 float-start">
            <h5>Datos del Cliente</h5>
            <p>
                <span class="label">Nombre completo:</span>
                <span>{{ $invoice->user->name }}, {{ $invoice->user->lastname }}</span>
            </p>
            <p>
                <span class="label">Número de documento:</span>
                <span>{{ $invoice->user->document_number }}</span>
            </p>
            <p>
                <span class="label">Fecha:</span>
                <span>{{ $invoice->date }}</span>
            </p>
            <p>
                <span class="label">Hora:</span>
                <span>{{ $invoice->hour }}</span>
            </p>
        </div>
        <div class="col-6 float-start" >
            <h5>Datos del Pedido</h5>
            <p>
                <span class="label">Razón social:</span>
                <span>Los Archivos del Duque</span>
            </p>
            <p>
                <span class="label">RUC del vendedor:</span>
                <span>20108818748</span>
            </p>
            <p>
                <span class="label">Tipo de Entrega:</span>
                <span>Recojo en tienda.</span>
            </p>
            <p>
                <span class="label">Dirección:</span>
                <span>Av. Izaguirre 325, Independencia.</span>
            </p>
        </div>
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
