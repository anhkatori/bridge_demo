$('.add').on('click', function() {
    $.ajax({
        method: "get",
        url: "/admin/staff/add",
        success: function(data) {
            console.log(data);
            var $select = $('#type');
            $select.empty();
            for (var i = 0; i < data.type.length; i++) {
                $select.append('<option value=' + data.type[i].id + '>' + data.type[i].name +
                    '</option>');
            }
            var $user = $('#full_name');
            $user.empty();
            for (var i = 0; i < data.user.length; i++) {
                $user.append('<option value=' + data.user[i].staff_id + '>' + data.user[i]
                    .full_name +
                    '</option>');
            }
            $("#type").select2();
            $("#full_name").select2();
        }
    })
})
$(document).on('click', '#save-staff', function (event) {
    event.preventDefault();
    var form = $('#form-add-staff');
    $( '.err' ).html("");
    $.ajax({
        type: 'get',
        url: '/admin/staff/store',
        data: form.serialize(), // serializes the form's elements.
        success: function (data) {
            $('#staff_add').modal("hide");
            if (data == true) {
                fetch_data();
                status_success('Thêm thành công !');
            } else {
                status_error('Thêm thất bại !');
            }
        },
        error: function (error) {
            var data = error.responseJSON;
            console.log(data)
            if (data.errors) {
                if (data.errors.salary) {
                    $('#salary_staff_error').html(data.errors.salary[0]);
                }
                if (data.errors.insurance) {
                    $('#insurance_staff_error').html(data.errors.insurance[0]);
                }
            }
        }
    });
});
$(document).on('click', '.edit', function (event) {
    var id = $(this).attr("data-id");
    $.ajax({
        method: "get",
        url: "/admin/staff/edit/" + id,
        success: function(data) {
            var $select = $('#staff_type');
            $select.empty();
            for (var i = 0; i < data.type.length; i++) {
                if (data.type[i].id == data.staff.role_id) {
                    $select.append('<option selected value=' + data.type[i].id +
                        '>' + data.type[i].name + '</option>');
                } else {
                    $select.append('<option value=' + data.type[i].id +
                        '>' + data.type[i].name + '</option>');
                }
            }
            // var $user = $('#full_name_edit');
            // $user.empty();
            // for (var i = 0; i < data.user.length; i++) {
            //     if (data.user[i].staff_id == data.staff.staff_id) {
                    // $user.append('<input disabled class="content" name="staff_id"  value=' + data.staff.full_name + '>' );
            //     } else {
            //         $user.append('<option value=' + data.user[i].staff_id + '>' + data.user[i]
            //             .full_name + '</option>');
            //     }
            // }
            $('#full_name_edit').val(data.staff.full_name);
            $('#staff_id').val(data.staff.staff_id);
            $('#id').val(id);
            // $('#staff').val(data.staff.full_name);
            $('#salary').val(data.staff.salary);
            $('.time_salary').val(data.staff.time_salary);
            $('#insurance').val(data.staff.insurance);
            $('.time_insurance').val(data.staff.time_insurance);
        }

    })
})
$(document).on('click', '#update-staff', function (event) {
    event.preventDefault();
    var form = $('#form-edit-staff');
    $( '.err' ).html("");
    $.ajax({
        type: 'get',
        url: '/admin/staff/update',
        data: form.serialize(),
        success: function (data) {
            $('#staff_edit').modal("hide");
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
                if (data.errors.salary) {
                    $('#salary_staff_edit_error').html(data.errors.salary[0]);
                }
                if (data.errors.insurance) {
                    $('#insurance_staff_edit_error').html(data.errors.insurance[0]);
                }
            }
        }
    });
});
$(document).on('click', '#delete-staff', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/staff/destroy/" + id;
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
