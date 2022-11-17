$(document).on('click', '#add-ot', function (event) {
    event.preventDefault();
    $( '.err' ).html("");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/OT/add",
        success: function (data) {
            $('#OT_add').modal("show");
            $('input[name="month"]').val(data.month);
            var $select = $('#staff');
            $select.empty();
            for (var i = 0; i < data.staff.length; i++) {
                $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                    .full_name + '</option>');
            }
            $("#staff").select2();
        }
    })
})
$('#OT_add').on('hide.bs.modal', function (e) {
    $(".field_clear").val('');
})
$(document).on('click', '#save-ot', function (event) {
    event.preventDefault();
    var form = $('#form-add-ot');
    $( '.err' ).html("");
    $.ajax({
        type: 'get',
        url: '/admin/OT/store',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            $('#OT_add').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Thêm thành công !');
            } else {
                status_error('Thêm thất bại !');
            }
        },
        error: function (error) {
            var data = error.responseJSON;
            if (data.errors) {
                if (data.errors.month) {
                    $('#month_error').html(data.errors.month[0]);
                }
                if (data.errors.staff_id) {
                    $('#staff_id_error').html(data.errors.staff_id[0]);
                }
                if (data.errors.time_OT) {
                    $('#time_OT_error').html(data.errors.time_OT[0]);
                }
                if (data.errors.OT_cost) {
                    $('#OT_cost_error').html(data.errors.OT_cost[0]);
                }
            }
        }
    });
});
$(document).on('click', '.edit', function (event) {
    var id = $(this).attr("data-id");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/OT/edit/" + id,
        success: function (data) {
            var $select = $('#staff_id');
            $select.empty();
            for (var i = 0; i < data.staff.length; i++) {
                if (data.staff[i].staff_id == data.ot.staff_id) {
                    $select.append('<option selected value=' + data.staff[i].staff_id +
                        '>' + data.staff[i].full_name + '</option>');
                }
                else {
                    $select.append('<option value=' + data.staff[i].staff_id +
                        '>' + data.staff[i].full_name + '</option>');
                }
            }
            $("#staff_id").select2();
            $('#only_day2').val(data.ot.time);
            $('#time_OT').val(data.ot.time_OT);
            $('#OT_cost').val(data.ot.OT_cost);
            $('#id').val(id);
        }
    })
})
$(document).on('click', '#update-ot', function (event) {
    event.preventDefault();
    var form = $('#form-edit-ot');
    $( '.err' ).html("");
    $.ajax({
        type: 'get',
        url: '/admin/OT/update',
        data: form.serialize(),
        success: function (data) {
            $('#OT_edit').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Sửa thành công !');
            } else {
                status_error('Sửa thất bại !');
            }
        },
        error: function (error) {
            var data = error.responseJSON;
            if (data.errors) {
                if (data.errors.month) {
                    $('#month_edit_error').html(data.errors.month[0]);
                }
                if (data.errors.staff_id) {
                    $('#staff_id_edit_error').html(data.errors.staff_id[0]);
                }
                if (data.errors.time_OT) {
                    $('#time_OT_edit_error').html(data.errors.time_OT[0]);
                }
                if (data.errors.OT_cost) {
                    $('#OT_cost_edit_error').html(data.errors.OT_cost[0]);
                }
            }
        }
    });
});
$(document).on('click', '#delete-ot', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/OT/destroy/" + id;
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

