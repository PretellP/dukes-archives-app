$(function () {

    var $grid = $('.products_container').isotope({
        itemSelector: '.product-item',
        percentPosition: false,
        masonry: {
            columnWidth: '.product-item'
        }
    });

    // Manejar el cambio en los checkboxes
    $('input[type="checkbox"]').change(function () {

        var selectedCategories = $('input[type="checkbox"]:checked').map(function () {
            return $(this).data('filter');
        }).get();

        var filterValue = selectedCategories.length > 0 ? selectedCategories.join(', ') : '*';

        $grid.isotope({ filter: filterValue});

        console.log('Elementos filtrados:', $grid.data('isotope').filteredItems.length);
    });


    function isValidDate(dateString) {
        var regEx = /^\d{4}-\d{2}-\d{2}$/
        return typeof dateString === 'string' ? dateString.match(regEx) : null
    }

    jQuery.extend(jQuery.validator.messages, {
        required: '<i class="fa-solid fa-circle-exclamation"></i> &nbsp; Este campo es obligatorio',
        email: 'Ingrese un email válido',
        number: 'Por favor, ingresa un número válido',
        url: 'Por favor, ingresa una URL válida',
        digits: 'Por favor, ingresa solo números enteros',
        max: jQuery.validator.format('Por favor, ingrese un valor menor o igual a {0}'),
        min: jQuery.validator.format('Por favor, ingrese un valor mayor o igual a {0}'),
        step: jQuery.validator.format("Ingrese un número múltiplo de {0}"),
        maxlength: jQuery.validator.format("Ingrese menos de {0} caracteres."),
        minlength: jQuery.validator.format("Por favor, Ingrese al menos {0} caracteres.")
    });


    jQuery.validator.addMethod("minAge",
        function (value, element, param) {
            date = moment(new Date(value))
            date_reach = moment().subtract(param, 'years')
            return date <= date_reach
    });

    jQuery.validator.addMethod("birthdate",
        function (value, element) {
            if (isValidDate(value)) {
                date_value = new Date(value)
                date = moment(moment(date_value).add(1, 'days').format('YYYY-MM-DD'))
                now = moment(moment().tz('America/Lima').format('YYYY-MM-DD'))
                return date <= now
            } else {
                return false
            }
    });

    jQuery.validator.addMethod("lettersOnly",
        function (value, element, param) {
            return this.optional(element) || (/^[a-z," ", áéíóúñ]+$/i.test(value) == param);
    });
});
