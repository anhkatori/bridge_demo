$(document).on('click', '#edit-role', function (event) {
    event.preventDefault();
    let href = $(this).attr('data-attr');
    let display_name = $(this).attr('data-display_name');
    let name = $(this).attr('data-name');
    $.ajax({
        global: false,
        url: href,
        success: function (result) {
            $('#modal-edit-role').modal("show");
            $('#body-edit-role').html(result).show();
            $('#role-input-text').val(display_name);
            $('#role-name').val(name);
        },
        error: function (jqXHR, testStatus, error) {
            console.log(error);
            alert("Page " + href + " cannot open. Error:" + error);
        },
        timeout: 8000
    })
});
$(document).on('click', '#del-role', function (event) {
    event.preventDefault();
    let $id = $(this).attr('data-id');
    $.ajax({
        type: 'get',
        url: '/admin/role/destroy/' + $id,
        success: function (data) {
            if (data == true) {
                fetch_data();
                status_success('Xóa thành công !');
            } else {
                status_error('Xóa thất bại !');
            }
        },
        error: function (error) {
            status_error('Lỗi:' + error);
        }
    });
});
$(document).on('click', '#add-role', function (event) {
    event.preventDefault();
    $('#modal-add-role').modal("show");
});
$('#modal-add-role').on('hide.bs.modal', function (e) {
    $('#role-name').css("border-color", "#E6EBF1");
    $("#role-name").val('');
})
$(document).on('click', '#save-role', function (event) {
    event.preventDefault();
    let $name = $("#role-name").val();
    if ($name == '') {
        $('#role-name').css("border-color", "red");
    }
    $.ajax({
        type: 'get',
        url: '/admin/role/insert',
        data: {
            'name': $name
        },
        success: function (data) {
            $('#modal-add-role').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Thêm thành công !');
            } else {
                status_error('Thêm thất bại !');
            }
        },
        error: function (error) {
            status_error('Lỗi:' + error);
        }
    });
});
$(document).on('click', '#update-role', function (event) {
    event.preventDefault();
    let $name = $('#role-name').val();
    let $permissions = [];
    $('input:checked').map(function () {
        $permissions.push($(this).val())
    });
    $.ajax({
        type: 'get',
        url: '/admin/role/update',
        data: {
            'name': $name,
            'permissions': $permissions
        },
        success: function (data) {
            $('#modal-edit-role').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Sửa thành công !');
            } else {
                status_error('Sửa thất bại !');
            }
        },
        error: function (error) {
            status_error('Lỗi:' + error);
        }
    });
});