import { Toast, ToastError, SwalDelete } from '../../../admin/js/sweet_alerts.js';

$(function () {

    $(".qtybutton").on("click", function () {
        var $button = $(this);
        var oldValue = $button.parent().find("input").val();

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 1) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 1;
            }
        }
        $button.parent().find("input").val(newVal);
    });

    $('html').on('click', '.qtybutton', function () {

        var input = $(this).parent().find('input')
        var val = input.val()
        var url = input.data('url')

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                value: val
            },
            dataType: 'JSON',
            success: function (data) {

                if (data.success) {

                    console.log(data.subtotal)

                    let subtotal_container = input.closest('.product-cart-row').find('.total-price.subtotal')
                    let total_container = $('#total-prices-container')

                    total_container.find('.subtotal-pr-cont').text('S/.' + data.total)
                    total_container.find('.total-pr-cont').text('S/.' + data.total)

                    subtotal_container.text('S/.' + data.subtotal)

                } else {
                    ToastError.fire()
                }

            },
            error: function (data) {
                console.log(data)
            }
        })

    }),

        $('#addToCartBtn').on('click', function () {
            var quantities = {};

            $('.quantity-input').each(function () {
                var productId = $(this).data('productid');
                var quantity = $(this).val();
                quantities[productId] = quantity;
            });

            var url = $(this).data('url');

            $.ajax({
                url: url,
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    quantities: quantities,

                },
                dataType: 'JSON',
                success: function (data) {
                    $('.product-cart-row').remove();

                },
                error: function (data) {
                    console.error(data);

                }
            });
        });

})
