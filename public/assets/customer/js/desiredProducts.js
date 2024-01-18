$(function(){
    $('.quantity-input').on('change', function(){
        var productId = $(this).data('product-id');
        var input = $('quantity-input_' + productId);
      
        var quantityProduct = parseInt(input.val(), 10);
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            type: 'POST',
            url: "/home.wishlist.updateQuantity",

            data: {
                'product_id': productId,
                'quantity': quantityProduct
            },
            success: function(response){ 
                var subtotal = parseFloat(response.subtotal).toFixed(2);
                $('.subtotal[data-product-id="' + productId + '"]').text('S/' + subtotal);
             
                var total = parseFloat(response.total).toFixed(2);
                $('#total').text('S/' + total);
             },
            error: function(response){
                console.log(response);
            }
        });
    });
});
