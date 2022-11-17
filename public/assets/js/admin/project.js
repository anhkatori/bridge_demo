$('#project_add').on('hide.bs.modal', function (e) {
    $(".field_clear").val('');
    $('.err').html('');
})
$('#project_edit').on('hide.bs.modal', function (e) {
    $('.err').html('');
})
$(document).on('click', '#add-project', function (event) {
    event.preventDefault;
    $.ajax({
        global: false,
        type: 'get',
        url: '/admin/project/add',
        success: function (data) {
            $('#project_add').modal("show");
            $('input[name="startDate"]').data('daterangepicker').setStartDate(data.startDate);
            $('input[name="startDate"]').data('daterangepicker').setEndDate(data.endDate);
            $('#status').val(0);
        }
    })
})
$(document).on('click', '#save-project', function (event) {
    event.preventDefault();
    var form = $('#form-add-project');
    $.ajax({
        type: 'get',
        url: '/admin/project/store',
        data: form.serialize(),
        success: function (data) {
            $('#project_add').modal("hide");
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
                if (data.errors.project_name) {
                    $('#name_error').html(data.errors.project_name[0]);
                }
                if (data.errors.Sale_PIC) {
                    $('#pic_error').html(data.errors.Sale_PIC[0]);
                }
                if (data.errors.Market) {
                    $('#market_error').html(data.errors.Market[0]);
                }
                if (data.errors.startDate) {
                    $('#time_error').html(data.errors.startDate[0]);
                }
                if (data.errors.status) {
                    $('#status_error').html(data.errors.status[0]);
                }
            }
        }
    });
});
$(document).on('click', '#edit-project', function (event) {
    var id = $(this).attr("data-id");
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/project/edit/" + id,
        success: function (data) {
            $('#project_edit').modal("show");
            $('#project_name').val(data.project.project_name);
            $('#Sale_PIC').val(data.project.Sale_PIC);
            $('#Market').val(data.project.Market);
            $('.time_edit').val(data.project.Time_deployment_start + " - " + data.project.Time_deployment_end);
            $('#id').val(id);
            $('#status_edit').val(data.project.status);
            // $('#status option[value = ' + data.project.status + ']').attr('selected', true);
        }
    })
})
$(document).on('click', '#update-project', function (event) {
    event.preventDefault();
    var form = $('#form-edit-project');
    $.ajax({
        type: 'get',
        url: '/admin/project/update',
        data: form.serialize(),
        success: function (data) {
            $('#project_edit').modal("hide");
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
                if (data.errors.project_name) {
                    $('#name_edit_error').html(data.errors.project_name[0]);
                }
                if (data.errors.Sale_PIC) {
                    $('#pic_edit_error').html(data.errors.Sale_PIC[0]);
                }
                if (data.errors.Market) {
                    $('#market_edit_error').html(data.errors.Market[0]);
                }
                if (data.errors.startDate) {
                    $('#time_edit_error').html(data.errors.startDate[0]);
                }
                if (data.errors.status) {
                    $('#status_edit_error').html(data.errors.status[0]);
                }
            } 
        }
    });
});
$(document).on('click', '#delete-project', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/project/destroy/" + id;
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
