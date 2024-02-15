import { DataTableEs } from '../datatable_lang.js';
import { Toast, ToastError, SwalDelete } from '../sweet_alerts.js';
import {
    setActiveCheckbox,
    initImageChange,
    setActiveSubmitButton,
    InitSelect2
} from '../../../common/js/utils.js';

$(() => {

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

    var salesTableEle = $('#sales-table');
    var getDataTable = salesTableEle.data('url');
    var salesTable = salesTableEle.DataTable({
        language: DataTableEs,
        responsive: true,
        serverSide: true,
        processing: true,
        ajax: getDataTable,
        columns: [
            { data: 'id', name: 'id' },
            { data: 'user.name', name: 'user.name' },
            { data: 'date', name: 'date' },
            { data: 'hour', name: 'hour' },
            { data: 'qtty_products', name: 'qtty_products', orderable: false},
            { data: 'total_amount', name: 'total_amount', orderable: false},
            { data: 'total_worth', name: 'total_worth', orderable: false},
        ],
        order: [
            [0, 'desc']
        ]
    });


    //--------- view customer -----------

    // ---------------- VER -------------------

    var viewRegisterObject = $('#viewUserForm')

    initRoleSelect(viewRegisterObject.find('.roleSelect'), viewRegisterObject)
    initGenderSelect(viewRegisterObject.find('.genderSelect'), viewRegisterObject)
    initDocTypeSelect(viewRegisterObject.find('.document_type_select'), viewRegisterObject)

    $('html').on('click', '.view_user_btn', function () {
        var modal = $('#viewUserModal')
        var form = modal.find('#viewUserForm')
        var getDataUrl = $(this).data('url')
        var genderSelect = form.find('.genderSelect')
        var roleSelect = form.find('.roleSelect')
        var docTypeSelect = form.find('.document_type_select')

        $.ajax({
            type: 'GET',
            url: getDataUrl,
            dataType: 'JSON',
            success: function (data) {

                var user = data.user;

                $.each(user, function (key, value) {
                    let input = form.find('[name='+ key +']')
                    if (input) {
                        input.val(value)
                    }
                })

                form.find('.status-btn').html(user.status)

                genderSelect.val(user.gender).change()
                roleSelect.val(user.role_id).change()
                docTypeSelect.val(user.document_type).change()

            },
            complete: function (data) {
                modal.modal('show')
            },
            error: function (data) {
                console.log(data)
            }
        })
    })

})
