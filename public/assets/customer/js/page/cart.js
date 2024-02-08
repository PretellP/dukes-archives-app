import { Toast, ToastError, SwalDelete } from '../../../admin/js/sweet_alerts.js';

$(function () {

    $('html').on('click', '.qtybutton', function () {

        var $button = $(this);
        var input = $(this).parent().find('input')
        var val = input.val()
        var url = input.data('url')

        if ($button.text() == "+") {
            var newVal = parseFloat(val) + 1;
        } else {
            var newVal = parseFloat(val) - 1;
        }

        if (!$(this).hasClass('disabled') && newVal > 0) {

            $('.mercadopago-button').empty().removeClass('active')
            $('.qtybutton').addClass('disabled')

            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    value: newVal
                },
                dataType: 'JSON',
                success: function (data) {

                    if (data.success) {

                        let subtotal_container = input.closest('.product-cart-row').find('.total-price.subtotal')
                        let total_container = $('#total-prices-container')

                        total_container.find('.subtotal-pr-cont').text('S/.'+ data.total)
                        total_container.find('.total-pr-cont').text('S/.'+ data.total)

                        subtotal_container.text('S/.'+ data.subtotal)

                        const mp = new MercadoPago(data.key, {
                            locale: "es-AR",
                        })

                        mp.checkout({
                            preference: {
                                id: data.id,
                            },
                            render: {
                                container: ".mercadopago-button",
                                label: "Pagar"
                            }
                        })

                        $('.mercadopago-button').addClass('active')

                    } else {
                        ToastError.fire()
                    }
                },
                complete: function (data) {

                    $button.parent().find("input").val(newVal);

                    $('.qtybutton').removeClass('disabled')
                },
                error: function (data){
                    console.log(data)
                }
            })


        }

    })

})
