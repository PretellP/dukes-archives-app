

$(function () {

    $('html').on('click', '.openProductDetailModal', function () {

        var button = $(this);
        var url = button.data('url');
        var getDataUrl = button.data('send');
        var modal = $('#productModal');

        var labelsContainer = modal.find('.labels');
        labelsContainer.empty();

        var imagesContainer = modal.find('#modalTabContent'); // El contenedor de imágenes en el modal
        imagesContainer.empty();

        $.ajax({
            type: 'GET',
            url: getDataUrl,
            dataType: 'JSON',
            success: function (data) {
                var product_images_container = modal.find('#product__modal-box')
                product_images_container.empty()


                var product = data.product

                var name = product.name;
                var description = product.description;
                var author = product.author;
                var sale_price = product.sale_price;
                var labels = product.labels;  // Un conjunto de etiquetas  // Una lista de imágenes

                // // Actualizar elementos con las etiquetas
                 // El contenedor de etiquetas en el modal
                 // Limpiar el contenedor antes de agregar nuevas etiquetas

                labels.forEach(function (label, i) {
                    let labelName = label.name
                    if (!(labels.length == (i+1))) {
                        labelName += ', '
                    } else {
                        labelName += '.'
                    }
                    var labelElement = $('<span>').text(labelName).addClass('label');
                    labelsContainer.append(labelElement);
                });

                modal.find('.name').text(name);
                modal.find('.description').text(description);
                modal.find('.author').text(author);
                modal.find('.sale_price').text(sale_price);

                product_images_container.html(data.html)
            },
            complete: function (data) {
                modal.modal('show')
            },
            error: function (data) {
                console.log(data)
            }
        });

        modal.find('#show-product-details').attr('action', url);
    });
});
