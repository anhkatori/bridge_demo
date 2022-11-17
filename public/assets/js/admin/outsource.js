$(document).on('click', '#add-outsource', function (event) {
    event.preventDefault();
    $('#month_error').html("");
    $('#staff_id_error').html("");
    $('#project_id_error').html("");
    $('#outsource_cost_error').html("");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/outsource/add",
        success: function (data) {
            $('#add_outsource').modal("show");
            $('input[name="month"]').val(data.month);
            var $select = $('#staff_outsource');
            $select.empty();
            for (var i = 0; i < data.staff.length; i++) {
                $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                    .full_name + '</option>');
            }
            var $project = $('#project_name');
            $project.empty();
            for (var i = 0; i < data.project.length; i++) {
                $project.append('<option value=' + data.project[i].id + '>' + data.project[i]
                    .project_name + '</option>');
            }
            $("#staff_outsource").select2();
            $("#project_name").select2();
        }
    })
})
$('#add_outsource').on('hide.bs.modal', function (e) {
    $(".field_clear").val('');
})
$(document).on('click', '#save-outsource', function (event) {
    event.preventDefault();
    var form = $('#form-add-outsource');
    $.ajax({
        type: 'get',
        url: '/admin/outsource/store',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            $('#add_outsource').modal("hide");
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
                if (data.errors.staff_id) {
                    $('#project_id_error').html(data.errors.staff_id[0]);
                }
                if (data.errors.outsource_cost) {
                    $('#outsource_cost_error').html(data.errors.outsource_cost[0]);
                }
            }
        }
    });
});
$(document).on('click', '#edit-outsource', function (event) {
    var id = $(this).attr("data-id");
    $('#month_edit_error').html("");
    $('#staff_id_edit_error').html("");
    $('#project_id_edit_error').html("");
    $('#outsource_cost_edit_error').html("");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/outsource/edit/" + id,
        success: function (data) {
            console.log(data);
            var $select = $('#staff_edit_otsource');
            $select.empty();
            for (var i = 0; i < data.staff.length; i++) {
                if (data.staff[i].staff_id == data.outsource.staff_id) {
                    $select.append('<option selected value=' + data.staff[i].staff_id + '>' +
                        data.staff[i]
                            .full_name + '</option>');
                } else {
                    $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[
                        i]
                        .full_name + '</option>');
                }
            }
            var $project = $('#project_name_edit');
            $project.empty();
            for (var i = 0; i < data.project.length; i++) {
                if (data.project[i].id == data.outsource.project_id) {
                    $project.append('<option selected value=' + data.project[i].id + '>' + data
                        .project[
                        i]
                        .project_name + '</option>');
                } else {
                    $project.append('<option value=' + data.project[i].id + '>' + data.project[
                        i]
                        .project_name + '</option>');
                }
            }
            $("#project_name_edit").select2();
            $("#staff_edit_otsource").select2();
            $('.time_edit').val(data.outsource.time);
            $('#outsource_cost').val(data.outsource.outsource_cost);
            $('#id').val(id);
        }
    })
})
$(document).on('click', '#update-outsource', function (event) {
    event.preventDefault();
    var form = $('#form-edit-outsource');
    $.ajax({
        type: 'get',
        url: '/admin/outsource/update',
        data: form.serialize(),
        success: function (data) {
            $('#outsource_edit').modal("hide");
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
                if (data.errors.staff_id) {
                    $('#project_id_edit_error').html(data.errors.staff_id[0]);
                }
                if (data.errors.outsource_cost) {
                    $('#outsource_cost_edit_error').html(data.errors.outsource_cost[0]);
                }
            }
        }
    });
});
$(document).on('click', '.delete', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/outsource/destroy/" + id;
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
