$(function () {


    if ($('#users-table').length) {

        /* -------- SELECT ----------*/

        $('#registerRoleSelect').select2({
            dropdownParent: $("#RegisterUserModal"),
            placeholder: 'Selecciona un rol'
        })

        $('#registerCompanySelect').select2({
            dropdownParent: $("#RegisterUserModal"),
            placeholder: 'Selecciona una empresa'
        })

        $('#registerMiningUnitsSelect').select2({
            dropdownParent: $("#RegisterUserModal"),
            placeholder: 'Selecciona una o más unidades mineras',
            closeOnSelect: false
        });

        $('#editRoleSelect').select2({
            dropdownParent: $("#EditUserModal"),
            placeholder: 'Selecciona un rol'
        })

        $('#editCompanySelect').select2({
            dropdownParent: $("#EditUserModal"),
            placeholder: 'Selecciona una empresa'
        })

        $('#editMiningUnitsSelect').select2({
            dropdownParent: $("#EditUserModal"),
            placeholder: 'Selecciona una o más unidades mineras',
            closeOnSelect: false
        })


        /* --------------------------------*/

        var usersTableEle = $('#users-table');
        var getDataTable = usersTableEle.data('url');
        var usersTable = usersTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: getDataTable,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'dni', name: 'dni' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'role', name: 'role', orderable: false, },
                { data: 'company.description', name: 'company.description', orderable: false },
                { data: 'status-btn', name: 'status-btn', orderable: false, searchable: false },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            order: [
                [0, 'desc']
            ]
        });


        $('#register-user-status-checkbox').change(function () {
            var txtDesc = $('#txt-register-description-user');
            if (this.checked) {
                txtDesc.html('Activo');
            } else {
                txtDesc.html('Inactivo')
            }
        });


        /* ------------ REGISTRAR -------------*/

        var inputUserImageStore = $('#input-user-image-store');
        inputUserImageStore.on("change", function () {

            if ($(this).val()) {
                // $('#registerUserForm').validate()
                // $('#image-upload-category-edit').rules('add', { required: true })

                var img_path = $(this)[0].value;
                var img_holder = $(this).closest('#registerUserForm').find('.img-holder');
                var currentImagePath = $(this).data('value');
                var img_extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

                if (img_extension == 'jpeg' || img_extension == 'jpg' || img_extension == 'png') {
                    if (typeof (FileReader) != 'undefined') {
                        img_holder.empty()
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<img/>', { 'src': e.target.result, 'class': 'img-fluid avatar_img' }).
                                appendTo(img_holder);
                        }
                        img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        $(img_holder).html('Este navegador no soporta Lector de Archivos');
                    }
                } else {
                    $(img_holder).html(currentImagePath);
                    inputUserImageStore.val('')
                    Toast.fire({
                        icon: 'warning',
                        title: '¡Selecciona una imagen!',
                    });
                }
            }
        })

        var registerUserForm = $('#registerUserForm').validate({
            rules: {
                dni: {
                    required: true,
                    maxlength: 11,
                    remote: {
                        url: $('#registerUserForm').data('validate'),
                        method: $('#registerUserForm').attr('method'),
                        dataType: 'JSON',
                        data: {
                            dni: function () {
                                return $('#registerUserForm').find('input[name=dni]').val()
                            }
                        }
                    }
                },
                name: {
                    required: true,
                    maxlength: 255
                },
                paternal: {
                    required: true,
                    maxlength: 255
                },
                maternal: {
                    required: true,
                    maxlength: 255
                },
                email: {
                    required: true,
                    maxlength: 255,
                    email: true
                },
                password: {
                    required: true
                },
                telephone: {
                    maxlength: 20
                },
                role: {
                    required: true
                },
                cip: {
                    maxlength: 10
                },
                company_id: {
                    required: true
                },
                "id_mining_units[]": {
                    required: true
                },
                position: {
                    maxlength: 255
                }
            },
            messages: {
                dni: {
                    remote: 'Este usuario ya está registrado'
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

        $('#btn-register-user-modal').on('click', function () {
            var modal = $('#RegisterUserModal')
            var button = $(this)
            var select = modal.find('#registerCompanySelect')
            var url = button.data('url')

            registerUserForm.resetForm()
            select.html('');

            $.ajax({
                type: 'GET',
                url: url,
                dataType: 'JSON',
                success: function (data) {
                    var companies = data['companies']
                    select.append('<option></option>')

                    $.each(companies, function (key, values) {
                        select.append('<option value="' + values.id + '">' + values.description + '</option>');
                    })
                },
                complete: function (data) {
                    modal.modal('toggle')
                },
                error: function (data) {
                    console.log(data)
                }
            })

            // modal.modal('toggle')
        })


        /* ---------------- EDITAR  ----------------- */

        $('#edit-user-status-checkbox').change(function () {
            var txtDesc = $('#txt-edit-description-user');
            if (this.checked) {
                txtDesc.html('Activo');
            } else {
                txtDesc.html('Inactivo')
            }
        });

        var editUserForm = $('#editUserForm').validate({
            rules: {
                dni: {
                    required: true,
                    maxlength: 11,
                    remote: {
                        url: $('#editUserForm').data('validate'),
                        method: $('#editUserForm').attr('method'),
                        dataType: 'JSON',
                        data: {
                            dni: function () {
                                return $('#editUserForm').find('input[name=dni]').val()
                            },
                            id: function () {
                                return $('#editUserForm').find('input[name=id]').val()
                            }
                        }
                    }
                },
                name: {
                    required: true,
                    maxlength: 255
                },
                paternal: {
                    required: true,
                    maxlength: 255
                },
                maternal: {
                    required: true,
                    maxlength: 255
                },
                email: {
                    required: true,
                    maxlength: 255,
                    email: true
                },
                telephone: {
                    maxlength: 20
                },
                role: {
                    required: true
                },
                cip: {
                    maxlength: 10
                },
                company_id: {
                    required: true
                },
                "id_mining_units[]": {
                    required: true
                },
                position: {
                    maxlength: 255
                }
            },
            messages: {
                dni: {
                    remote: 'Este usuario ya está registrado'
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
                    }
                })
            }
        })

        var inputUserImageEdit = $('#input-user-image-edit');
        inputUserImageEdit.on("change", function () {

            if ($(this).val()) {

                var img_path = $(this)[0].value;
                var img_holder = $(this).closest('#editUserForm').find('.img-holder');
                var currentImagePath = $(this).data('value');
                var img_extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

                if (img_extension == 'jpeg' || img_extension == 'jpg' || img_extension == 'png') {
                    if (typeof (FileReader) != 'undefined') {
                        img_holder.empty()
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('<img/>', { 'src': e.target.result, 'class': 'img-fluid avatar_img' }).
                                appendTo(img_holder);
                        }
                        img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    } else {
                        $(img_holder).html('Este navegador no soporta Lector de Archivos');
                    }
                } else {
                    $(img_holder).html(currentImagePath);
                    inputUserImageEdit.val('')
                    Toast.fire({
                        icon: 'warning',
                        title: '¡Selecciona una imagen!',
                    });
                }
            }
        })

        $('.main-content').on('click', '.editUser', function () {
            var modal = $('#EditUserModal')
            var getDataUrl = $(this).data('send')
            var url = $(this).data('url')
            var form = modal.find('#editUserForm')
            var selectCompany = modal.find('#editCompanySelect')
            var selectRole = modal.find('#editRoleSelect')
            var selectMiningUnits = modal.find('#editMiningUnitsSelect')

            selectCompany.html('')
            selectMiningUnits.html('')
            editUserForm.resetForm()
            form.trigger('reset')

            form.attr('action', url)

            $.ajax({
                type: 'GET',
                url: getDataUrl,
                dataType: 'JSON',
                success: function (data) {

                    var user = data['user'];

                    modal.find('input[name=id]').val(user.id);
                    modal.find('input[name=dni]').val(user.dni);
                    modal.find('input[name=name]').val(user.name);
                    modal.find('input[name=paternal]').val(user.paternal);
                    modal.find('input[name=maternal]').val(user.maternal);
                    modal.find('input[name=email]').val(user.email);
                    modal.find('input[name=telephone]').val(user.telephone);
                    modal.find('input[name=cip]').val(user.cip);
                    modal.find('input[name=position]').val(user.position);

                    selectRole.val(user.role).change();
                    selectCompany.append('<option></option>')
                    $.each(data['companies'], function (key, values) {
                        selectCompany.append('<option value="' + values.id + '">' + values.description + '</option>')
                    })

                    selectCompany.val(user.company_id).change()

                    selectMiningUnits.append('<option></option>')
                    $.each(data.miningUnits, function (key, values) {
                        selectMiningUnits.append('<option value="' + values.id + '">' + values.description + '</option>')
                    })

                    selectMiningUnits.val(data.miningUnitsSelect).change()

                    modal.find('.img-holder').html('<img class="img-fluid avatar_img" id="image-avatar-edit" src="' + data.url_img + '"></img>');
                    modal.find('#input-user-image-edit').attr('data-value', '<img scr="' + data.url_img + '" class="img-fluid avatar_img"></img>');
                    modal.find('#input-user-image-edit').val('');

                    if (user.active == 'S') {
                        modal.find('#edit-user-status-checkbox').prop('checked', true);
                        $('#txt-edit-description-user').html('Activo');
                    } else {
                        modal.find('#edit-user-status-checkbox').prop('checked', false);
                        $('#txt-edit-description-user').html('Inactivo');
                    }
                },
                complete: function (data) {
                    modal.modal('toggle')
                },
                error: function (data) {
                    console.log(data)
                }
            })
        })


        /* ----------- ELIMINAR ---------------*/

        $('.main-content').on('click', '.deleteUser', function () {
            var url = $(this).data('url')

            SwalDelete.fire().then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function (result) {
                            if (result.success === true) {
                                usersTable.ajax.reload(null, false)
                                Toast.fire({
                                    icon: 'success',
                                    text: '¡Registro eliminado!',
                                })
                            }
                        },
                        error: function (result) {
                            Toast.fire({
                                icon: 'error',
                                title: '¡Ocurrió un error inesperado!',
                            });
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            });
        })



        // ----------- REGISTRO MASIVO -----------


        var registerUserMassiveForm = $('#registerUserMassiveForm').validate({
            rules: {
                file: {
                    required: true,
                },
            },
            submitHandler: function (form, event) {
                event.preventDefault()
                var form = $(form)
                var loadSpinner = form.find('.loadSpinner')
                var modal = $('#RegisterUserMassiveModal')

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

                            usersTable.ajax.reload(null, false)

                            registerUserMassiveForm.resetForm()
                            form.trigger('reset')
                            modal.modal('hide')

                            Toast.fire({
                                icon: 'success',
                                text: data.message
                            }).then((result) => {
                                if (result.dismiss === Swal.DismissReason.timer) {
                                    if (data.foundDuplicates) {
                                        var notebody = $('<ul/>')
                                        $.each(data.notebody, function (key, values) {
                                            var sub_li = $('<li/>').html(values)
                                            notebody.append(sub_li)
                                        })

                                        Swal.fire({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: true,
                                            timerProgressBar: false,
                                            icon: 'warning',
                                            title: data.note,
                                            html: notebody[0].outerHTML
                                        })
                                    }
                                }
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


    }


    if ($('#files-folder-course-table').length) {

        var filesTableEle = $('#files-folder-course-table');
        var getDataUrl = filesTableEle.data('url');
        var filesTable = filesTableEle.DataTable({
            language: DataTableEs,
            serverSide: true,
            processing: true,
            ajax: getDataUrl,
            columns: [
                { data: 'id', name: 'id' },
                { data: 'filename', name: 'filename', orderable: false },
                { data: 'file_type', name: 'file_type' },
                { data: 'category', name: 'category' },
                { data: 'parent_folder', name: 'parent_folder', orderable: false },
                { data: 'created_at', name: 'created_at' },
                { data: 'updated_at', name: 'updated_at' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ]
        });

        $('.main-content').on('click', '.deleteFile', function () {
            var url = $(this).data('url')

            SwalDelete.fire().then(function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        dataType: 'JSON',
                        success: function (result) {
                            if (result.success === true) {
                                filesTable.draw();
                                Toast.fire({
                                    icon: 'success',
                                    text: '¡Archivo eliminado!',
                                })
                            }
                        },
                        error: function (result) {
                            Toast.fire({
                                icon: 'error',
                                title: '¡Ocurrió un error inesperado!',
                            });
                        }
                    });
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            });
        })

        $('#btn-destroy-folder').on('click', function (e) {
            e.preventDefault()
            var form = $('#delete-folder-form')

            Swal.fire({
                title: '¿Eliminar carpeta?',
                text: "¡Esto eliminará todo el contenido de la carpeta!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '¡Sí!',
                cancelButtonText: 'Cancelar',
                reverseButtons: true,
            }).then(function (e) {
                if (e.value === true) {
                    form.submit();
                } else {
                    e.dismiss;
                }
            }, function (dismiss) {
                return false;
            });
        })


    }
})

