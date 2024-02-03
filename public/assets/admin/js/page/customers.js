import { DataTableEs } from '../datatable_lang.js';
import { Toast, ToastError, SwalDelete } from '../sweet_alerts.js';
import { setActiveCheckbox, initImageChange, setActiveSubmitButton } from '../../../common/js/utils.js';

$(function () {


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


    var customerTableEle = $('#customers-table');
    var getDataTable = customerTableEle.data('url');
    var custoemrsTable = customerTableEle.DataTable({
        language: DataTableEs,
        responsive: true,
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
            { data: 'role.name', name: 'role.name'},
            { data: 'status', name: 'status', searchable: false },
        ],
        order: [
            [0, 'desc']
        ]
    });



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

                form.find('input[name=password]').attr('placeholder', 'Ingrese una nueva contraseña')
                form.find('input[name=id]').val(user.id)
                form.find('input[name=name]').val(user.name);
                form.find('input[name=lastname]').val(user.lastname);
                form.find('input[name=birthdate]').val(user.birthdate);
                form.find('input[name=email]').val(user.email);
                form.find('input[name=document_number]').val(user.document_number);
                form.find('input[name=phone]').val(user.phone);
                form.find('input[name=nickname]').val(user.nickname);
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
