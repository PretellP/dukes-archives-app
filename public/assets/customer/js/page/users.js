import { Toast, ToastError, SwalDelete } from '../../../admin/js/sweet_alerts.js';
// import { setActiveCheckbox, initImageChange, setActiveSubmitButton } from '../../../common/js/utils.js';

$(function () {

    /* ---------------- EDITAR  ----------------- */

    // var formEditObject = $('#editUserForm')
    // initRoleSelect(formEditObject.find('.roleSelect'), formEditObject)
    // initGenderSelect(formEditObject.find('.genderSelect'), formEditObject)
    // initDocTypeSelect(formEditObject.find('.document_type_select'), formEditObject)


    var editUserForm = $('#editUserForm').validate({
        rules: {
            name: {
                required: true,
                maxlength: 100
            },
            lastname: {
                required: true,
                maxlength: 100
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
                maxlength: 255
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: $('#editUserForm').data('validateemail'),
                    method: $('#editUserForm').attr('method'),
                    dataType: 'JSON',
                    data: {
                        id: function () {
                            return $('#editUserForm').find('input[name=id]').val()
                        },
                        nickname: function () {
                            return $('#editUserForm').find('input[name=email]').val()
                        }
                    }
                }
            },
        },
        messages: {
            email: {
                remote: 'Este correo ya está registrado'
            },
            birthdate: {
                minAge: 'No es posible registrar a un usuario menor de edad.',
                birthdate: 'No puede ingresar una fecha mayor a la actual'
            }
        },
        submitHandler: function (form, event) {

            event.preventDefault()
            var form = $(form)
            var loadSpinner = form.find('.loadSpinner')
            // var modal = $('#EditUserModal')

            var formData = new FormData(form[0])

            loadSpinner.toggleClass('active')

            form.find('.btn-save').attr('disabled', 'disabled')

            $.ajax({
                method: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success: function (data) {

                    if (data.success) {

                        // usersTable.ajax.reload(null, false)
                        form.trigger('reset')
                        // modal.modal('hide')

                        Toast.fire({
                            icon: 'success',
                            text: data.message
                        })
                    }
                    else {
                        Toast.fire({
                            icon: 'error',
                            text: data.message
                        })
                    }
                },
                complete: function (data) {
                    loadSpinner.toggleClass('active')
                    form.find('.btn-save').removeAttr('disabled')
                },
                error: function (data) {
                    console.log(data)
                    ToastError.fire()
                }
            })
        }
    })


    $('html').on('change', '#editUserForm select[name=document_type]', function () {

        var input = $('#editUserForm').find('input[name=document_number]')

        if ($(this).val() == 1){
            $('#editUserForm').validate();
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

})
