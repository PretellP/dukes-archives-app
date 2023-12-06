$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
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
        digits: 'Por favor, ingresa solo números',
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

});
