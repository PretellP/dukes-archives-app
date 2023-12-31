function setActiveCheckbox(ele, txtClass) {
    $('html').on('change', ele, function () {
        var txtDesc = $(this).closest('form').find(txtClass)
        txtDesc.html(`${this.checked ? 'Activo' : 'Inactivo'}`)
    })

}

function initImageChange(inputEle, formEle, Toast) {

    inputEle.val('');
    inputEle.on("change", function () {
        var img_path = $(this)[0].value;
        var img_holder = formEle.find('.img-holder');
        var img_extension = img_path.substring(img_path.lastIndexOf('.') + 1).toLowerCase();

        if (img_extension == 'jpeg' || img_extension == 'jpg' || img_extension == 'png') {
            if (typeof (FileReader) != 'undefined') {
                img_holder.empty()
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('<img/>', { 'src': e.target.result, 'class': 'img-fluid' }).
                        appendTo(img_holder);
                }
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html('Este navegador no soporta Lector de Archivos');
            }
        } else {
            $(img_holder).empty();
            Toast.fire({
                icon: 'warning',
                title: '¡Selecciona una imagen!'
            });
        }
    })
}

function setActiveSubmitButton(buttonEle) {
    buttonEle.click(function () {
        $('button[type=submit]', $(this).parents('form')).removeAttr('clicked').removeAttr('name')
        $(this).attr('clicked', 'true').attr('name', 'verifybtn')
    })
}


function InitSelect2(ele_class, config = {}){

    $(ele_class).each(function () {

        let select_cnf = {
            dropdownParent: $(this).closest('form')
        }

        for (let key in config) {
            select_cnf[key] = config[key]
        }

        $(this).select2(select_cnf)
    })
}

export {
    setActiveCheckbox,
    initImageChange,
    setActiveSubmitButton,
    InitSelect2
};








