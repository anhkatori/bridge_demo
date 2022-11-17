$(document).on("click", "#add-users", function () {
    $.ajax({
        type: "get",
        url: "/admin/user/add",
        success: function (data) {
            // console.log(data);
            $("#add-user").modal("show");
        },
    });
});

$(document).on("click", "#save-user", function (event) {
    event.preventDefault();
    var form = $("#form-add-user");
    $.ajax({
        type: "get",
        url: "/admin/user/store",
        data: form.serialize(),
        success: function (data) {
            fetch_data();
            $("#add-user").modal("hide");
            status_success("Thêm thành công !");
        },
        error: function(error) {
            err = error.responseJSON;
            console.log(err.errors);
            if (err.errors) {
                if (err.errors.full_name) {
                    $('#full_name_error').html(err.errors.full_name[0]);
                }
                if (err.errors.email) {
                    $('#email_error').html(err.errors.email[0]);
                }
            }
        }
    });
});

$(document).on("click", "#edit-user", function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    $.ajax({
        type: "get",
        url: "/admin/user/edit/" + id,
        success: function (data) {      
            $("#users_edit").modal("show");
            $("#id").val(id);
            $("#full_name").val(data.users[0].full_name)
            $("#gender").val(data.users[0].gender)
        },
    });
});

$(document).on("click", "#btn-edit-user", function (event) {
    event.preventDefault();
    var form = $("#form-edit-user");
    $.ajax({
        type: "get",
        url: "/admin/user/update",
        data: form.serialize(),
        success: function (data) {
            fetch_data();
            $("#users_edit").modal("hide");
            status_success("Sửa thành công");
        },
    });
});

$(document).on("click", "#delete-user", function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/user/destroy/" + id;
        $.ajax({
            type: "get",
            url: href,
            success: function () {
                fetch_data();
                $("#delete_button").removeClass("delete_button_active");
                $("#delete_button").addClass("delete_button");
                status_success("Xóa thành công !");
            },
            error: function (error) {
                status_error("Lỗi");
            },
        });
    }
});
