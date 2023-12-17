import { DataTableEs } from '../datatable_lang.js';
import { Toast, ToastError, SwalDelete } from '../sweet_alerts.js';
import {
        setActiveCheckbox,
        initImageChange,
        setActiveSubmitButton,
        InitSelect2
} from '../../../common/js/utils.js';

$(function () {

    setActiveCheckbox('.product-status-checkbox', '.txt-status-product')

    let select_categories_cnf = {
        placeholder: 'Selecciona una o más categorías',
        closeOnSelect: false,
    }
    InitSelect2('.cotegories_select', select_categories_cnf)

    const productFormRules = {
        name: {
            required: true,
            maxlength: 100,
        },
        description: {
            required: true,
            maxlength: 600,
        },
        author: {
            required: true,
            maxlength: 100,
            lettersOnly: true,
        },
        "categories[]": {
            required: true,
        },
        purchase_price: {
            required: true,
            number: true,
            max: 999999.99,
            min: 0,
            step: 0.01
        },
        sale_price: {
            required: true,
            number: true,
            max: 999999.99,
            step: 0.01,
            min: 0
        },
        stock: {
            digits: true,
            step: 1,
            min: 0
        },
        "images[]": {
            required: true
        }
    }

    const imageFilepondConfig = {
        'allowMultiple': true,
        'name': 'images[]',
        'dropValidation': true,
        'storeAsFile': true,
        'labelIdle': '<i class="fa-solid fa-images me-2"></i> \
                        Arrastra y suelta una imagen o \
                        <span class="filepond--label-action"> Explora </span>',
        'checkValidity': true,
        'allowReorder': true,
        'acceptedFileTypes': ['image/*'],
        'labelFileTypeNotAllowed': 'Este tipo de archivo no es válido',
        'fileValidateTypeLabelExpectedTypes': 'Se espera {lastType}'
    }

    // ----------- TABLE PRODUCTOS --------------

    var productsTableEle = $('#products-table')
    var getDataTable = productsTableEle.data('url')
    var productsTable = productsTableEle.DataTable({
        language: DataTableEs,
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: getDataTable,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'image', name: 'image' },
            { data: 'name', name: 'name' },
            { data: 'description', name: 'description' },
            { data: 'author', name: 'author' },
            { data: 'labels.name', name: 'labels.name'},
            { data: 'purchase_price', name: 'purchase_price'},
            { data: 'sale_price', name: 'sale_price'},
            { data: 'status', name: 'status', searchable: false },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });

    // $('.product-image-input').filepond()
    $('.product-image-input').filepond(imageFilepondConfig);


    // ---------- REGISTER ----------------

    var registerProductForm = $('#registerProductForm').validate({
        rules: productFormRules,
        messages: {
            author:{
                lettersOnly: 'Ingrese solo letras'
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault()
            var form = $(form)
            var loadSpinner = form.find('.loadSpinner')
            var modal = $('#RegisterProductModal')

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

                        registerProductForm.resetForm()
                        productsTable.ajax.reload(null, false)

                        form.trigger('reset')
                        modal.modal('hide')

                        Toast.fire({
                            icon: 'success',
                            text: data.message
                        })

                    } else {
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

    // ------- EDIT ------------

    var editProductForm = $('#editProductForm').validate({
        rules: productFormRules,
        messages: {
            author:{
                lettersOnly: 'Ingrese solo letras'
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault()
            var form = $(form)
            var loadSpinner = form.find('.loadSpinner')
            var modal = $('#editProductModal')

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

                        editProductForm.resetForm()
                        productsTable.draw()

                        form.trigger('reset')
                        modal.modal('hide')

                        Toast.fire({
                            icon: 'success',
                            text: data.message
                        })

                    } else {
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

    $('html').on('click', '.editProduct', function () {
        var button = $(this)
        var getDataUrl = button.data('send')
        var url = button.data('url')
        var modal = $('#editProductModal')
        var form = modal.find('#editProductForm')

        var labelSelect = form.find('.cotegories_select')

        var imageInput = form.find('.product-image-input')
        imageInput.filepond('removeFiles')
        form.attr('action', url)

        $.ajax({
            url: getDataUrl,
            type: 'GET',
            dataType: 'JSON',
            success: function (data) {

                let images = data.files
                let product = data.product

                imageInput.filepond('addFiles', images)

                $.each(product, function (key, value) {
                    let input = form.find('[name='+ key +']')
                    if (input) {
                        input.val(value)
                    }
                })

                labelSelect.val(product.labels_ids).change()

                if (product.status == 1) {
                    form.find('.product-status-checkbox').prop('checked', true);
                    form.find('.txt-status-product').html('Activo');
                } else {
                    form.find('.product-status-checkbox').prop('checked', false);
                    form.find('.txt-status-product').html('Inactivo');
                }

                modal.modal('show')
            },
            error: function (data) {
                console.log(data)
            }
        })
    })

    // ------ DELETE ----------

    $('html').on('click', '.deleteProduct', function () {
        var url = $(this).data('url')

        SwalDelete.fire().then(function (e) {
            if (e.value === true) {
                $.ajax({
                    type: 'DELETE',
                    url: url,
                    dataType: 'JSON',
                    success: function (data) {

                        if (data.success) {

                            productsTable.ajax.reload(null, false)

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
