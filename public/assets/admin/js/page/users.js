import { DataTableEs } from '../datatable_lang.js';
import { Toast, ToastError, SwalDelete } from '../sweet_alerts.js';

$(function () {

    /* -------- SELECT ----------*/

    function initRoleSelect (select, parent) {
        select.select2({
            dropdownParent: parent,
            placeholder: 'Selecciona un rol',
            minimumResultsForSearch: -1
        })
    }

    function initGenderSelect (select, parent) {
        select.select2({
            dropdownParent: parent,
            placeholder: 'Selecciona un género',
            minimumResultsForSearch: -1
        })
    }

    function initDocTypeSelect (select, parent) {
        select.select2({
            dropdownParent:  parent,
            placeholder: 'Selecciona un tipo',
            minimumResultsForSearch: -1
        })
    }


    $('html').on('change', '.user-status-checkbox', function () {
        var txtDesc = $(this).closest('form').find('.txt-status-user');
        if (this.checked) {
            txtDesc.html('Activo');
        } else {
            txtDesc.html('Inactivo')
        }
    })

    /*------------------------------------*/

    var usersTableEle = $('#users-table');
    var getDataTable = usersTableEle.data('url');
    var usersTable = usersTableEle.DataTable({
        language: DataTableEs,
        serverSide: true,
        processing: true,
        ajax: getDataTable,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'gender', name: 'gender' },
            { data: 'email', name: 'email' },
            { data: 'birthdate', name: 'birthdate'},
            { data: 'document_type', name: 'document_type'},
            { data: 'document_number', name: 'document_number'},
            { data: 'phone', name: 'phone'},
            { data: 'role_id', name: 'role_id'},
            { data: 'status', name: 'status', searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });

    /* ------------ REGISTRAR -------------*/

    $('#RegisterUserModal').on('show.bs.modal', function () {
        var dateInput = $(this).find('input[name=birthdate]')
        var password_text = $(this).find('label.password_text')

        dateInput.val(moment().format('YYYY-MM-DD'))
        $(this).find('.roleSelect').val('').change()
        $(this).find('.genderSelect').val('').change()
        $(this).find('.document_type_select').val('').change()

        password_text.html('Contraseña *')
        $(this).find('input[name=password]').attr('placeholder', 'Ingrese la contraseña del usuario')
    })

    var formRegisterObject = $('#registerUserForm')

    initRoleSelect(formRegisterObject.find('.roleSelect'), formRegisterObject)
    initGenderSelect(formRegisterObject.find('.genderSelect'), formRegisterObject)
    initDocTypeSelect(formRegisterObject.find('.document_type_select'), formRegisterObject)

    var registerUserForm = $('#registerUserForm').validate({
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
            },
            document_type: {
                required: true
            },
            document_number: {
                required: true,
                maxlength: 255
            },
            phone: {
                required: true,
                maxlength: 255
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
                        nickname: function () {
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
                maxlength: 255
            },
        },
        messages: {
            nickname: {
                remote: 'Este nombre de usuario ya se está usando'
            },
            email: {
                remote: 'Este correo ya está registrado'
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault()
            var form = $(form)
            var loadSpinner = form.find('.loadSpinner')
            var modal = $('#RegisterUserModal')

            loadSpinner.toggleClass('active')
            form.find('.btn-save').attr('disabled', 'disabled')

            var formData = new FormData(form[0])

            $.ajax({
                method: form.attr('method'),
                url: form.attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success: function (data) {

                    if (data.success) {

                        registerUserForm.resetForm()
                        usersTable.ajax.reload(null, false)

                        form.trigger('reset')
                        modal.modal('hide')

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
                    form.find('.btn-save').removeAttr('disabled')
                    loadSpinner.toggleClass('active')
                },
                error: function (data) {
                    console.log(data)
                    ToastError.fire()
                }
            })
        }
    })


    /* ---------------- EDITAR  ----------------- */

    var formEditObject = $('#editUserForm')
    initRoleSelect(formEditObject.find('.roleSelect'), formEditObject)
    initGenderSelect(formEditObject.find('.genderSelect'), formEditObject)
    initDocTypeSelect(formEditObject.find('.document_type_select'), formEditObject)

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
            },
            document_type: {
                required: true
            },
            document_number: {
                required: true,
                maxlength: 255
            },
            phone: {
                required: true,
                maxlength: 255
            },
            role_id: {
                required: true,
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
            nickname: {
                required: true,
                maxlength: 100,
                remote: {
                    url: $('#editUserForm').data('validatenickname'),
                    method: $('#editUserForm').attr('method'),
                    dataType: 'JSON',
                    data: {
                        id: function () {
                            return $('#editUserForm').find('input[name=id]').val()
                        },
                        nickname: function () {
                            return $('#editUserForm').find('input[name=nickname]').val()
                        }
                    }
                }
            },
        },
        messages: {
            nickname: {
                remote: 'Este nombre de usuario ya se está usando'
            },
            email: {
                remote: 'Este correo ya está registrado'
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault()
            var form = $(form)
            var loadSpinner = form.find('.loadSpinner')
            var modal = $('#EditUserModal')

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

                        usersTable.ajax.reload(null, false)
                        form.trigger('reset')
                        modal.modal('hide')

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

    $('html').on('click', '.editUser', function () {
        var modal = $('#EditUserModal')
        var getDataUrl = $(this).data('send')
        var url = $(this).data('url')
        var form = modal.find('#editUserForm')
        var genderSelect = form.find('.genderSelect')
        var roleSelect = form.find('.roleSelect')
        var docTypeSelect = form.find('.document_type_select')

        editUserForm.resetForm()
        form.trigger('reset')

        form.attr('action', url)

        $.ajax({
            type: 'GET',
            url: getDataUrl,
            dataType: 'JSON',
            success: function (data) {

                var user = data.user;

                var password_text = form.find('label.password_text')
                password_text.html('Actualizar contraseña (opcional)')

                form.find('input[name=password]').attr('placeholder', 'Ingrese una nueva contraseña')
                form.find('input[name=id]').val(user.id)
                form.find('input[name=name]').val(user.name);
                form.find('input[name=lastname]').val(user.lastname);
                form.find('input[name=birthdate]').val(user.birthdate);
                form.find('input[name=email]').val(user.email);
                form.find('input[name=document_number]').val(user.document_number);
                form.find('input[name=phone]').val(user.phone);
                form.find('input[name=nickname]').val(user.nickname);

                genderSelect.val(user.gender).change()
                roleSelect.val(user.role_id).change()
                docTypeSelect.val(user.document_type).change()

                if (user.status == 1) {
                    form.find('.user-status-checkbox').prop('checked', true);
                    $('.txt-status-user').html('Activo');
                } else {
                    form.find('.user-status-checkbox').prop('checked', false);
                    $('.txt-status-user').html('Inactivo');
                }

                if (data.isAuth) {
                    roleSelect.attr('readonly', true)
                } else {
                    roleSelect.removeAttr('readonly')
                }
            },
            complete: function (data) {
                modal.modal('show')
            },
            error: function (data) {
                console.log(data)
            }
        })
    })


    /* ----------- ELIMINAR ---------------*/

    $('html').on('click', '.deleteUser', function () {
        var url = $(this).data('url')

        SwalDelete.fire().then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    dataType: 'JSON',
                    success: function (data) {

                        if (data.success) {

                            usersTable.ajax.reload(null, false)

                            Toast.fire({
                                icon: 'success',
                                text: data.message,
                            })

                        } else {
                            Toast.fire({
                                icon: 'error',
                                text: data.message
                            })
                        }
                    },
                    error: function (data) {
                        ToastError.fire()
                    }
                });
            } else {
                e.dismiss;
            }
        }, function (dismiss) {
            return false;
        });
    })


})