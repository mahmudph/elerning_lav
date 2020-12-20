/*
  global fungsi request api bentuk modal
  panggil fungsi api request to server
*/

function goAjaxGet(targetUrl, $button) {
    return $.ajax({
        type: "GET",
        url: targetUrl,
        dataType: "html",
        cache: false,
        success: function(data) {
            $("#modal_content_body").html(data);
        }
    });
}

/* handel tambah data modal */
$(document).on("click", "#modal-save", function(event) {
    var dataForm = $("#form-tambah").serialize();
    console.log(dataForm);
    $.ajax({
        type: "POST",
        data: dataForm,
        url: $("#form-tambah").attr("action"),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        // enctype: "multipart/form-data",
        // dataType: "json",
        cache: false,
        beforeSend: function() {},
        success: function(data) {
            /* hide modal */
            $("#modalContent").modal("hide");

            /* append message */
            $("#msg-app-data").append("Berhasil Menambah data");

            /* reload datatables */
            $("#datatable")
                .DataTable()
                .ajax.reload();

            /* show ajax msg */
            $("#msg-app-content").css("display", "block");
        },
        error: function(data, e) {
            let errors = [];
            /* eterow data error */
            for (let item in data.responseJSON.errors) {
                `<span>${errors.push(data.responseJSON.errors[item])}</span>`;
            }
            /* appen msg */
            $("#msg-data").append(errors.join("</br>"));

            /* show msg modal  */
            $("#msg-content").css("display", "block");
        }
    });
});

/* handel modal post data edit */

/* handel tambah atau edit data modal */
$(document).on("click", "#modal-edit", function(event) {
    var dataForm = $("#form-edit").serialize();
    $.ajax({
        type: "POST",
        data: dataForm,
        url: $("#form-edit").attr("action"),
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        // enctype: "multipart/form-data",
        // dataType: "json",
        cache: false,
        beforeSend: function() {},
        success: function(data) {
            /* hide modal */
            console.log(data);
            $("#modalContent").modal("hide");
            /* append message */
            $("#msg-app-data").append("Berhasil Mengumbah data");

            /* reload datatables */
            $("#datatable")
                .DataTable()
                .ajax.reload();

            /* show ajax msg */
            $("#msg-app-content").css("display", "block");
        },
        error: function(data, e) {
            let errors = [];
            /* eterow data error */
            for (let item in data.responseJSON.errors) {
                `<span>${errors.push(data.responseJSON.errors[item])}</span>`;
            }
            /* appen msg */
            $("#msg-data").append(errors.join("<br/>"));

            /* show msg modal  */
            $("#msg-content").css("display", "block");
        }
    });
});
