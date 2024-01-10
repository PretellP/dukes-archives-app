$(function () {
    $('#productModal').on('shown.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var url = button.data('url');
        var getDataUrl = button.data('send');
        var modal = $(this);

        $.ajax({
            type: 'GET',
            url: getDataUrl,
            dataType: 'JSON',
            success: function (data) {
                var name = data.name;
                var description = data.description;
                var author = data.author;
                var sale_price = data.sale_price;
                var labels = data.labels;  // Un conjunto de etiquetas
                var images = data.files;   // Una lista de imágenes

                // Actualizar elementos con las etiquetas
                var labelsContainer = modal.find('.labels'); // El contenedor de etiquetas en el modal
                labelsContainer.empty(); // Limpiar el contenedor antes de agregar nuevas etiquetas

                // Iterar sobre la lista de etiquetas y agregarlas al modal
                labels.forEach(function (label) {
                    var labelElement = $('<span>').text(label.name).addClass('label');
                    labelsContainer.append(labelElement);
                });

                // Manejar las imágenes (si hay varias)
                var imagesContainer = modal.find('.tab-content'); // El contenedor de imágenes en el modal
                imagesContainer.empty(); // Limpiar el contenedor antes de agregar nuevas imágenes

                // Iterar sobre la lista de imágenes y agregarlas al modal
                images.forEach(function (image, index) {
                    var tabPane = $('<div>').addClass('tab-pane fade').attr('id', 'nav' + (index + 1)).attr('role', 'tabpanel');
                    var imgContainer = $('<div>').addClass('product__modal-img w-img');
                    var imgElement = $('<img>').attr('src', image.file_url).attr('alt', 'Image');

                    imgContainer.append(imgElement);
                    tabPane.append(imgContainer);
                    imagesContainer.append(tabPane);

                    // También actualizamos las pestañas (si hay varias)
                    var navLink = $('<button>').addClass('nav-link').attr('id', 'nav' + (index + 1) + '-tab').attr('data-bs-toggle', 'tab').attr('data-bs-target', '#nav' + (index + 1)).attr('type', 'button').attr('role', 'tab').attr('aria-controls', 'nav' + (index + 1)).attr('aria-selected', (index === 0));

                    var imgNav = $('<img>').attr('src', image.file_url).attr('alt', 'Navigation Image');

                    navLink.append(imgNav);
                    modal.find('#modalTab').append(navLink);
                });

                // Resto del código...
                modal.find('.name').text(name);
                modal.find('.description').text(description);
                modal.find('.author').text(author);
                modal.find('.sale_price').text(sale_price);
            },
            error: function (xhr, status, error) {
                console.error("XHR: ", xhr);
                console.error("Status: ", status);
                console.error("Error: ", error);
            }
        });

        modal.find('#show-product-details').attr('action', url);
    });
});
