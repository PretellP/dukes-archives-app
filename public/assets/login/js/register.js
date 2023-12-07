$(function () {

    if ($('#registerUserForm').length) {

        $('#registerUserForm').validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 100,
                    lettersOnly: true
                },
                lastname: {
                    required: true,
                    maxlength: 100,
                    lettersOnly: true
                },
                gender: {
                    required: true,
                },
                birthdate: {
                    required: true,
                    birthdate: true,
                    minAge: 18,
                },
                document_type: {
                    required: true
                },
                document_number: {
                    required: true,
                    maxlength: 255,
                    digits: true,
                    maxlength: 11,
                    minlength: 8
                },
                phone: {
                    maxlength: 9,
                    digits: true,
                    step: 1,
                    minlength: 5,
                },
                role_id: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                    remote: {
                        url: $('#registerUserForm').data('validateemail'),
                        method: $('#registerUserForm').attr('method'),
                        dataType: 'JSON',
                        data: {
                            email: function () {
                                return $('#registerUserForm').find('input[name=email]').val()
                            }
                        }
                    }
                },
                nickname: {
                    required: true,
                    maxlength: 100,
                    remote: {
                        url: $('#registerUserForm').data('validatenickname'),
                        method: $('#registerUserForm').attr('method'),
                        dataType: 'JSON',
                        data: {
                            nickname: function () {
                                return $('#registerUserForm').find('input[name=nickname]').val()
                            }
                        }
                    }
                },
                password: {
                    required: true,
                    maxlength: 255,
                    minlength: 8
                },
                check_authorize: {
                    required: true
                }
            },
            messages: {
                nickname: {
                    remote: 'Este nombre de usuario ya se está usando'
                },
                email: {
                    remote: 'Este correo ya está registrado'
                },
                birthdate: {
                    minAge: 'No es posible registrar a un usuario menor de edad.',
                    birthdate: 'No puede ingresar una fecha mayor a la actual'
                },
                name:{
                    lettersOnly: 'Ingrese solo letras'
                },
                lastname:{
                    lettersOnly: 'Ingrese solo letras'
                }
            },
            submitHandler: function (form, event) {
                event.preventDefault()

                $('#registerUserForm')[0].submit()
            }
        })


        $('html').on('change', '#registerUserForm select[name=document_type]', function () {

            var input = $('#registerUserForm').find('input[name=document_number]')
            input.val('')

            if ($(this).val() == 1){
                $('#registerUserForm').validate();
                input.rules('add',  { digits: true, maxlength: 11, minlength: 8});
                input.attr('onkeypress', 'return(event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))')
            }
            else {
                input.rules('remove',  'digits');
                input.rules('remove',  'maxlength');
                input.rules('remove',  'minlength');
                input.removeAttr('onkeypress')
            }
        })
    }
})
