var link = "";
function getFileData(myFile) {
    $('#check_image').html('');
    var file = myFile.files[0];
    if (file) {
        var filename = file.name;
        if ($("#image_div").is(":hidden")) {
            $("#image_div").show();
        }
        document.getElementById("image_show").src = URL.createObjectURL(file);
    }
    // convert to Base64
    if ($('#role').val() == "admin") {
        var file = document.querySelector(
            'input[type=file]')['files'][0];
        convert_to_base64(file);
    }
}
function convert_to_base64(file) {
    var reader = new FileReader();
    reader.onload = function () {
        base64String = reader.result.replace("data:", "")
            .replace(/^.+,/, "");
        imageBase64Stringsep = base64String;
        check_image(base64String);
    }
    reader.readAsDataURL(file);
}
function check_image(base64String) {
    $image = base64String;
    $.ajax({
        method: 'POST',
        type: 'POST',
        url: '/admin/users/responseImage',
        data: {
            'image': $image
        },
        beforeSend: function () {
            $('#loading1').css("visibility", "visible");
        },
        success: function (res) {
            if (res.error) {
                console.log(res.error);               //
                alert(res.error);                    //
            } else {                    //
                $('#temp_base64').val("");
                $('#loading1').css("visibility", "hidden");
                if (res.link_image == 0) {
                    $('#check_image').html($("#lang_none_face").val());
                    $('#check_image').css('color', 'red');
                    $('#submit_confirm').prop('disabled', true);
                } else if (res.link_image == 2) {
                    $('#check_image').html($("#lang_too_many_face").val());
                    $('#check_image').css('color', 'red');
                    $('#submit_confirm').prop('disabled', true);
                } else {
                    if (res.check == true) {
                        $('#modalCheckImage').modal('show');
                        $('#responseImage').attr('src', res.link_image);
                    }
                    else {
                        $('#check_image').html($("#lang_existed").val());
                        $('#check_image').css('color', 'red');
                        delete_temp(res.link_image);
                        $('#submit_confirm').prop('disabled', true);
                    }
                }
                $(document).on('click', '#confirm', function (e) {
                    $('#modalCheckImage').modal('hide');
                    $('#temp_base64').val(res.api_image);
                    $('#check_image').html("<i class='fa fa-check' aria-hidden='true'></i>" + $('#lang_face_checked').val());
                    $('#check_image').css('color', 'green');
                    $('#submit_confirm').prop('disabled', false);
                    delete_temp(res.link_image);
                });
                $(document).on('click', '#not_confirm', function (e) {
                    delete_temp(res.link_image);
                    $('#check_image').html($('#lang_not_face').val());
                    $('#check_image').css('color', 'orange');
                    $('#submit_confirm').prop('disabled', true);
                });
            }
        }
    })
}
function delete_temp($link) {
    $.ajax({
        method: 'POST',
        type: 'POST',
        url: '/admin/users/deleteTempImage',
        data: {
            'image': $link
        },
        error: function (xhr, ajaxOptions, thrownError) {
            alert(xhr.status);
            alert(thrownError);
          }
    })
}
