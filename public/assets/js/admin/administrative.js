$(document).on('click', '.add', function (event) {
    event.preventDefault();
    $( '.err' ).html("");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/administrative/add",
        success: function (data) {
            $('#administrative-add').modal("show");
            $('input[name="month"]').val(data.month);
        }
    })
});
$(document).on('click', '#save-administrative', function (event) {
    event.preventDefault();
    var form = $('#form-add-administrative');
    $( '.err' ).html("");
    $.ajax({
        type: 'get',
        url: '/admin/administrative/store',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            $('#administrative-add').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Thêm thành công !');
            } else {
                status_error('Thêm thất bại !');
            }
        },
        error: function (error) {
            var err = error.responseJSON;
            if (err.errors) {
                if (err.errors.office_cost) {
                    $('#office_cost_error').html(err.errors.office_cost[0]);
                }
                if (err.errors.other_cost) {
                    $('#other_cost_error').html(err.errors.other_cost[0]);
                }
                if (err.errors.staff_cost) {
                    $('#staff_cost_error').html(err.errors.staff_cost[0]);
                }
                if (err.errors.staffs) {
                    $('#staffs_error').html(err.errors.staffs[0]);
                }
            } 
        }
    });
});
$(document).on('click', '.edit_administrative', function (event) {
    var id = $(this).attr("data-id");
    $( '.err' ).html("");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/administrative/edit/" + id,
        success: function (data) {
            $('#office_cost').val(data.office_cost);
            $('.time_edit').val(data.time);
            $('#other_cost').val(data.other_cost);
            $('#staff_cost').val(data.staff_cost);
            $('#staffs').val(data.staffs);
            $('#id').val(id);
        }
    })
})
$('#administrative-add').on('hide.bs.modal', function (e) {
    $(".field_clear").val('');
})
$(document).on('click', '#update-administrative', function (event) {
    event.preventDefault();
    var form = $('#form-edit-administrative');
    $( '.err' ).html("");
    $.ajax({
        type: 'get',
        url: '/admin/administrative/update',
        data: form.serialize(),
        success: function (data) {
            $('#administrative_edit').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Sửa thành công !');
            } else {
                status_error('Sửa thất bại !');
            }
        },
        error: function (error) {
            var err = error.responseJSON;
            if (err.errors) {
                if (err.errors.office_cost) {
                    $('#office_cost_edit_error').html(err.errors.office_cost[0]);
                }
                if (err.errors.other_cost) {
                    $('#other_cost_edit_error').html(err.errors.other_cost[0]);
                }
                if (err.errors.staff_cost) {
                    $('#staff_cost_edit_error').html(err.errors.staff_cost[0]);
                }
                if (err.errors.staffs) {
                    $('#staffs_edit_error').html(err.errors.staffs[0]);
                }
            } 
        }
    });
});
$(document).on('click', '#delete_administrative', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/administrative/destroy/" + id;
        $.ajax({
            type: 'get',
            url: href,
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
    }
})



