import { DataTableEs } from '../datatable_lang.js';
import { Toast, ToastError, SwalDelete } from '../sweet_alerts.js';
import {
    setActiveCheckbox,
    initImageChange,
    setActiveSubmitButton,
    InitSelect2
} from '../../../common/js/utils.js';

$(() => {

    setActiveCheckbox('.status_banner_checkbox', '.txt-status-banner')

    var banerImageRegister = $("#input-banner-image-register");
    banerImageRegister.val("");
    banerImageRegister.on("change", function () {
        var img_path = $(this)[0].value;
        var img_holder = $(this)
            .closest("#registerBannerForm")
            .find(".img-holder");
        var img_extension = img_path
            .substring(img_path.lastIndexOf(".") + 1)
            .toLowerCase();

        if (
            img_extension == "jpeg" ||
            img_extension == "jpg" ||
            img_extension == "png"
        ) {
            if (typeof FileReader != "undefined") {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img/>", {
                        src: e.target.result,
                        class: "img-fluid category_img",
                    }).appendTo(img_holder);
                };
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html(
                    "Este navegador no soporta Lector de Archivos"
                );
            }
        } else {
            $(img_holder).empty();
            banerImageRegister.val("");
            Toast.fire({
                icon: "warning",
                title: "¡Selecciona una imagen!",
            });
        }
    });

    var registerBannerForm = $("#registerBannerForm").validate({
        rules: {
            description: {
                maxlength: 700,
                url: true,
            },
            image: {
                required: true,
            },
        },
        submitHandler: function (form, event) {
            event.preventDefault();

            var form = $(form);
            var loadSpinner = form.find(".loadSpinner");
            var modal = $("#registerBannerModal");
            var img_holder = form.find(".img-holder");

            loadSpinner.toggleClass("active");
            form.find(".btn-save").attr("disabled", "disabled");

            var formData = new FormData(form[0]);

            $.ajax({
                method: form.attr("method"),
                url: form.attr("action"),
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        var bannersContainer = $("#banners-list-container");
                        bannersContainer.html(data.html);
                        banerImageRegister.val("");
                        registerBannerForm.resetForm();

                        $(img_holder).empty();

                        modal.modal("toggle");

                        Toast.fire({
                            icon: "success",
                            text: data.message,
                        });
                    } else {
                        Toast.fire({
                            icon: "error",
                            text: data.message,
                        });
                    }
                },
                complete: function (data) {
                    form.find(".btn-save").removeAttr("disabled");
                    loadSpinner.toggleClass("active");
                },
                error: function (data) {
                    console.log(data);
                    ToastError.fire();
                },
            });
        },
    });

    var editBannerForm = $("#editBannerForm").validate({
        rules: {
            content: {
                maxlength: 5000,
                url: true,
            },
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            var form = $(form);
            var loadSpinner = form.find(".loadSpinner");
            var modal = $("#editBannerModal");
            var img_holder = form.find(".img-holder");

            loadSpinner.toggleClass("active");
            form.find(".btn-save").attr("disabled", "disabled");

            var formData = new FormData(form[0]);

            $.ajax({
                method: form.attr("method"),
                url: form.attr("action"),
                data: formData,
                processData: false,
                contentType: false,
                dataType: "JSON",
                success: function (data) {
                    if (data.success) {
                        let bannersBox = $("#banners-list-container");

                        bannersBox.html(data.html);
                        editBannerForm.resetForm();

                        modal.modal("hide");

                        $(img_holder).empty();

                        Toast.fire({
                            icon: "success",
                            text: data.message,
                        });
                    } else {
                        Toast.fire({
                            icon: "error",
                            text: data.message,
                        });
                    }
                },
                complete: function (data) {
                    loadSpinner.toggleClass("active");
                    form.find(".btn-save").removeAttr("disabled");
                },
                error: function (data) {
                    console.log(data);
                    ToastError.fire();
                },
            });
        },
    });

    var inputBannerEdit = $("#input-banner-image-edit");
    inputBannerEdit.on("change", function () {
        $("#editBannerForm").validate();
        $("#input-banner-image-edit").rules("add", { required: true });

        var img_path = $(this)[0].value;
        var img_holder = $(this)
            .closest("#editBannerForm")
            .find(".img-holder");
        var currentImagePath = $(this).data("value");
        var img_extension = img_path
            .substring(img_path.lastIndexOf(".") + 1)
            .toLowerCase();

        if (
            img_extension == "jpeg" ||
            img_extension == "jpg" ||
            img_extension == "png"
        ) {
            if (typeof FileReader != "undefined") {
                img_holder.empty();
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("<img/>", {
                        src: e.target.result,
                        class: "img-fluid category_img",
                    }).appendTo(img_holder);
                };
                img_holder.show();
                reader.readAsDataURL($(this)[0].files[0]);
            } else {
                $(img_holder).html(
                    "Este navegador no soporta Lector de Archivos"
                );
            }
        } else {
            $(img_holder).html(currentImagePath);
            inputBannerEdit.val("");
            Toast.fire({
                icon: "warning",
                title: "¡Selecciona una imagen!",
            });
        }
    });

    $("html").on("click", ".edit-banner-btn", function () {
        var modal = $("#editBannerModal");
        var getDataUrl = $(this).data("send");
        var url = $(this).data("url");
        var form = modal.find("#editBannerForm");

        form.validate();
        $("#input-banner-image-edit").rules("remove", "required");

        editBannerForm.resetForm();
        form.trigger("reset");

        form.attr("action", url);

        $.ajax({
            type: "GET",
            url: getDataUrl,
            dataType: "JSON",
            success: function (data) {

                let banner = data.banner;

                form.find(".banner-url-content-container").html(
                    banner.description
                );

                let raw_content = form.find(
                    ".banner-url-content-container > a"
                );

                form.find("input[name=description]").val(
                    raw_content.attr("href")
                );

                modal.find(".img-holder")
                    .html(
                        '<img class="img-fluid banner_img" id="image-banner-edit" src="' +
                            data.url_img +
                            '"></img>'
                    );
                modal.find("#input-banner-image-edit")
                    .attr(
                        "data-value",
                        '<img scr="' +
                            data.url_img +
                            '" class="img-fluid banner_img"></img>'
                    );

                modal.find("#input-banner-image-edit").val("");

                if (raw_content.attr("target") == "_BLANK") {
                    form.find("#checkbox-blank-indicator-edit").prop(
                        "checked",
                        true
                    );
                } else {
                    form.find("#checkbox-blank-indicator-edit").prop(
                        "checked",
                        false
                    );
                }

                if (banner.status == 1) {
                    modal.find(".status_banner_checkbox")
                        .prop("checked", true);
                    $(".txt-status-banner").html("Activo");
                } else {
                    modal
                        .find(".status_banner_checkbox")
                        .prop("checked", false);
                    $(".txt-status-banner").html("Inactivo");
                }
            },
            complete: function (data) {
                modal.modal("show");
            },
            error: function (data) {
                console.log(data);
            },
        });
    });

    // -------- ELIMINAR --------------

    $("html").on("click", ".delete-banner-btn", function () {
        var url = $(this).data("url");

        SwalDelete.fire().then(
            function (e) {
                if (e.value === true) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        dataType: "JSON",
                        success: function (result) {
                            if (result.success === true) {
                                var bannersContainer = $(
                                    "#banners-list-container"
                                );
                                bannersContainer.html(result.html);

                                Toast.fire({
                                    icon: "success",
                                    text: result.message,
                                });
                            } else {
                                Toast.fire({
                                    icon: "error",
                                    text: result.message,
                                });
                            }
                        },
                        error: function (result) {
                            ToastError.fire();
                            console.log(result);
                        },
                    });
                } else {
                    e.dismiss;
                }
            },
            function (dismiss) {
                return false;
            }
        );
    });
})
