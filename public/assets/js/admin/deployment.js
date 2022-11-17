
//
// $(document).on('click', '#add-deployment', function (event) {
//     $.ajax({
//         method: "get",
//         url: "/admin/deployment/add",
//         success: function (data) {
//             var $select = $('#staff');
//             $select.empty();
//             for (var i = 0; i < data.staff.length; i++) {
//                 $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
//                     .full_name + '</option>');
//             }
//             var $project = $('#project_name');
//             $project.empty();
//             for (var i = 0; i < data.project.length; i++) {
//                 $project.append('<option value=' + data.project[i].id + '>' + data.project[i]
//                     .project_name + '</option>');
//             }
//         }
//     })
// })
// $('#add_deployment').on('hide.bs.modal', function (e) {
//     $(".field_clear").val('');
// })
// $(document).on('click', '#save-deployment', function (event) {
//     event.preventDefault();
//     var form = $('#form-add-deployment');
//     $.ajax({
//         type: 'get',
//         url: '/admin/deployment/store',
//         data: form.serialize(), // serializes the form's elements.
//         success: function () {
//             fetch_data();
//             $('#add_deployment').modal("hide");
//             status_success('Thêm thành công !');
//         },
//         error: function (error) {
//             status_error('Lỗi:' + error);
//         }
//     });
// });
// $(document).on('click', '#edit-deployment', function (event) {
//     var id = $(this).attr("data-id");
//     $.ajax({
//         method: "get",
//         url: "/admin/deployment/edit/" + id,
//         success: function (data) {
//             console.log(data);
//             var $select = $('#staff_edit');
//             $select.empty();
//             for (var i = 0; i < data.staff.length; i++) {
//                 if (data.staff[i].staff_id == data.deployment.staff_id) {
//                     $select.append('<option selected value=' + data.staff[i].staff_id + '>' +
//                         data.staff[i]
//                             .full_name + '</option>');
//                 } else {
//                     $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[
//                         i]
//                         .full_name + '</option>');
//                 }
//             }
//             var $project = $('#project_name_edit');
//             $project.empty();
//             for (var i = 0; i < data.project.length; i++) {
//                 if (data.project[i].id == data.deployment.project_id) {
//                     $project.append('<option selected value=' + data.project[i].id + '>' + data
//                         .project[
//                         i]
//                         .project_name + '</option>');
//                 } else {
//                     $project.append('<option value=' + data.project[i].id + '>' + data.project[
//                         i]
//                         .project_name + '</option>');
//                 }
//             }
//             $('.time_edit').val(data.deployment.time);
//             $('#deployment_cost').val(data.deployment.deployment_cost);
//             $('#id').val(id);
//         }
//     })
// })
// $(document).on('click', '#update-deployment', function (event) {
//     event.preventDefault();
//     var form = $('#form-edit-deployment');
//     $.ajax({
//         type: 'get',
//         url: '/admin/deployment/update',
//         data: form.serialize(),
//         success: function (data) {
//             fetch_data();
//             $('#deployment_edit').modal("hide");
//             status_success('Sửa thành công !');
//         },
//         error: function (error) {
//             status_error('Lỗi:' + error);
//         }
//     });
// });
$(document).on('click', '#delete_deployment', function (event) {
    event.preventDefault();
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/deployment/destroy/" + id;
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