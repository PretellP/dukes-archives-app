$(function(){

    $('html').on('keyup', '.quantity-input', function(){

        if ($(this).val()) {

            var productId = $(this).data('productid');

            var input = $('#quantity-input_' + productId);

            var quantityProduct = input.val()

            console.log(quantityProduct)

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: $(this).data('url'),
                data: {
                    'quantity': quantityProduct
                },
                success: function(response){

                    console.log(response)

                    var subtotal = response.subtotal;
                    $('.subtotal[data-productid="' + productId + '"]').text('S/' + subtotal);

                    var total = response.total;
                    $('#total-value').text('S/' + total);
                 },
                error: function(response){
                    console.log(response);
                }
            });
        }
    });
});
