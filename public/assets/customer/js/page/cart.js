import { Toast, ToastError, SwalDelete } from '../../../admin/js/sweet_alerts.js';

$(function () {

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

                    total_container.find('.subtotal-pr-cont').text('S/.'+ data.total)
                    total_container.find('.total-pr-cont').text('S/.'+ data.total)

                    subtotal_container.text('S/.'+ data.subtotal)



                } else {
                    ToastError.fire()
                }

            },
            error: function (data){
                console.log(data)
            }
        })

    })

})
