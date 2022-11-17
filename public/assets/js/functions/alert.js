function status_success($text) {
    $('.alert-success').show();
    $('.alert-success').html($text);
    if ($(".alert")[0]) {
        setTimeout(function () {
            $(".alert").fadeOut();
        }, 3000);
    }
}
function status_error($text) {
    $('.alert-danger').show();
    $('.alert-danger').html($text);
    if ($(".alert")[0]) {
        setTimeout(function () {
            $(".alert").fadeOut();
        }, 3000);
    }
}