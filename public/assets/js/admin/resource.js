window.onbeforeunload = function () {
    localStorage.clear();
};

let $checkList_resource = [];
let $total_resource = $('#total-resource').val();
function check_number_of_checkbox() {
    if ($(":checkbox:checked").length > 1) {
        enable_delete_button();
    }
    else {
        disable_delete_button();
    }
};

function disable_delete_button() {
    $("#delete_button").removeClass("delete_button_active");
    $("#delete_button").addClass("delete_button");
    $("#delete_button").prop("disabled", true);
}

function enable_delete_button() {
    $("#delete_button").removeClass("delete_button");
    $("#delete_button").addClass("delete_button_active");
    $("#delete_button").prop("disabled", false);
}
function re_check_resource() {
    //check lại các checked checkbox
    if (localStorage.getItem("checkedAll-resource") == "1") {
        $("#checkAll-resource").prop("checked", true);
        // $("input[name=checkEach-resource]").prop("checked", true);
    } else {
        $("#checkAll-resource").prop("checked", false);
    }
    $checkList_resource = JSON.parse(localStorage.getItem("checkList-resource") || "[]");
    for (var i = 0; i < $checkList_resource.length; i++) {
        $("input[data-resource-id=" + $checkList_resource[i] + "]").prop('checked', true);
    };
}

//////////Search//////////
function debounce_resource(func, wait) {
    var timeout;
    return function () {
        var context = this,
            args = arguments;

        var executeFunction = function () {
            func.apply(context, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(executeFunction, wait);
    };
};
var search_resource = debounce_resource(function (e) {
    $value = $("#search_resource").val();
    $perPage = $("#value_page").val();
    ajaxsearch_resource();
}, 300);

$(document).on("keydown", "#search_resource", search_resource);

function ajaxsearch_resource() {
    $.ajax({
        type: "get",
        url: "/admin/resource/search",
        data: {
            search: $value,
            perPage: $perPage,
        },
        success: function (data) {
            // alert(data)
            $("#data-resource").html(data);
            re_check_resource();
        },
    });
}

function fetch_results_resource($numPage) {
    $value = $("#search_resource").val();
    $number = $("#value_page").val();
    $.ajax({
        global: false,
        type: "get",
        url: "/admin/resource/search",
        data: {
            search: $value,
            perPage: $number,
            numPage: $numPage,
        },
        success: function (data) {
            $("#data-resource").html(data);
            re_check_resource();
            $('.active').removeClass('active');
            $("[data-page=" + $numPage + "]").parent().addClass('active');
            if (parseInt($('#current-page').val()) >= parseInt($('#max-page').val())) {
                $('#pag-next').addClass('pagination-disabled');
            }
            if (parseInt($('#current-page').val()) > 0) {
                $('#pag-prev').removeClass('pagination-disabled');
            }
        },
    });
}

////////////  Check ///////////

$(document).on('click', "#checkAll-resource", function () {
    localStorage.removeItem("checkList-resource");
    if ($(this).is(":checked")) {
        $('input:checkbox').not(this).prop('checked', true);
        localStorage.setItem('checkedAll-resource', '1')
        $.ajax({
            global: false,
            type: "get",
            url: "/admin/resource/getAllID",
            success: function (data) {
                localStorage.setItem("checkList-resource", JSON.stringify(data));
            },
        });
    } else {
        $('input:checkbox').not(this).prop('checked', false);
        localStorage.setItem('checkedAll-resource', '0');
    }
    check_number_of_checkbox();
});

$(document).on("change", "#checkEach-resource", function () {
    $checkList_resource = JSON.parse(localStorage.getItem("checkList-resource") || "[]");
    if ($(this).is(":checked")) {
        if ($checkList_resource.indexOf($(this).attr("data-resource-id")) == -1) {
            $checkList_resource.push(Number($(this).attr("data-resource-id")));
        }
    } else {
        $checkList_resource.splice(
            $checkList_resource.indexOf(Number($(this).attr("data-resource-id"))),
            1
        );
    }
    localStorage.setItem("checkList-resource", JSON.stringify($checkList_resource));
    // alert($checkList_resource.length)
    if ($checkList_resource.length > 0) {
        enable_delete_button();
    } else {
        disable_delete_button();
    }
    if ($checkList_resource.length == $total_resource) {
        $("#checkAll-resource").prop("checked", true);
        localStorage.setItem("checkedAll-resource", "1");
    } else {
        $("#checkAll-resource").prop("checked", false);
        localStorage.setItem("checkedAll-resource", "0");
    }
});

$(document).on("change", "#value_page", function (event) {
    $perPage = $("#value_page").val();
    $.ajax({
        global: false,
        url: "/admin/resource/render",
        data: {
            perPage: $perPage,
        },
        success: function (data) {
            $("#data-resource").html(data);
            if ($("#search_resource").val() != "") {
                fetch_results_resource($numPage);
            } else {
                fetch_resource($perPage, $numPage)
            }
        },
    });
});

function fetch_resource($perPage, $numPage) {
    $.ajax({
        global: false,
        url: "/admin/resource/render",
        data: {
            perPage: $perPage,
            numPage: $numPage,
        },
        success: function (data) {
            $("#data-resource").html(data);
            re_check_resource();
            $('.active').removeClass('active');
            $("[data-page=" + $numPage + "]").parent().addClass('active');
            if (parseInt($('#current-page').val()) >= parseInt($('#max-page').val())) {
                $('#pag-next').addClass('pagination-disabled');
            }
            if (parseInt($('#current-page').val()) > 0) {
                $('#pag-prev').removeClass('pagination-disabled');
            }
            $('#sidebar_item-resource').addClass('active');
        },
    });
}
$(document).on('click', '#pag-item', function (event) {
    event.preventDefault();
    $perPage = $("#value_page").val();
    $numPage = $(this).attr('data-page');
    if ($("#search_resource").val() != "") {
        fetch_results_resource($numPage);
    } else {
        fetch_resource($perPage, $numPage)
    }
});

$(document).on('click', '#pag-next', function (event) {
    event.preventDefault();
    $perPage = $("#value_page").val();
    $numPage = parseInt($('#current-page').val()) + 1;
    if ($("#search_resource").val() != "") {
        fetch_results_resource($numPage);
    } else {
        fetch_resource($perPage, $numPage)
    }
});

$(document).on('click', '#pag-prev', function (event) {
    event.preventDefault();
    $perPage = $("#value_page").val();
    $numPage = parseInt($('#current-page').val()) - 1;
    if ($("#search_resource").val() != "") {
        fetch_results_resource($numPage);
    } else {
        fetch_resource($perPage, $numPage)
    }
});

/////////////////////////////////////////////////////////////////

$(document).on("click", "#delete_button", function () {
    $checkList_resource = JSON.parse(localStorage.getItem("checkList-resource") || "[]");
    $perPage = $("#value_page").val();
    $numPage = parseInt($('#current-page').val());
    if (
        confirm("Are you sure to delete " + $checkList_resource.length + " records ?") ==
        true
    ) {
        let $href = "/admin/resource/destroy/" + $checkList_resource;
        $.ajax({
            type: "get",
            url: $href,
            success: function () {
                if ($("#search_resource").val() != "") {
                    fetch_results_resource($numPage);
                } else {
                    fetch_resource($perPage, $numPage)
                }
                disable_delete_button();
                status_success(
                    "Xóa thành công " + $checkList_resource.length + " records !"
                );
            },
            error: function (error) {
                status_error("Lỗi:" + error);
            },
        });
        localStorage.removeItem("checkList-resource");
    }
});

$(document).on('click', '#delete-resource', function (event) {
    event.preventDefault();
    $perPage = $("#value_page").val();
    $numPage = parseInt($('#current-page').val());
    var id = $(this).attr("data-id");
    if (confirm("Are you sure to delete?") == true) {
        href = "/admin/resource/destroy/" + id;
        $.ajax({
            type: 'get',
            url: href,
            success: function (data) {
                if (data == true) {
                    if ($("#search_resource").val() != "") {
                        fetch_results_resource($numPage);
                    } else {
                        fetch_resource($perPage, $numPage)
                    }
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

///////////////////////////////////

var i = 0;
$('#add_user_project').on('click', function () {
    i++;
    var $select = $('.resource');
    $select.append(`
        <div class="box">
            <label class="title"> Dự án  </label>
            <input type="text" class="content" name="project_id` + i + `">
        </div>
        <div class="box">
            <label class="title">
                %effort
            </label>
            <input type="text" class="content" name="effort` + i + `">
        </div>
        `);

})
$('#resource_add').on('hide.bs.modal', function (e) {
    $(".field_clear").val('');
    $('.err').html('');
})
$(document).on('click', '#add_resource', function (event) {
    $.ajax({
        global: false,
        method: "get",
        url: "/admin/resource/add",
        success: function (data) {
            var $select = $('#staff_resource');
            $select.empty();
            for (var i = 0; i < data.staff.length; i++) {
                $select.append('<option value=' + data.staff[i].staff_id + '>' + data.staff[i]
                    .full_name + '</option>');
            }
            var $project = $('#project_resource');
            $project.empty();
            for (var i = 0; i < data.project.length; i++) {
                $project.append('<option value=' + data.project[i].id + '>' + data.project[i]
                    .project_name + '</option>');
            }
            $("#staff_resource").select2();
            $("#project_resource").select2();
        }
    })
})
$(document).on('click', '#save-resource', function (event) {
    event.preventDefault();
    var form = $('#form-add-resource');
    $.ajax({
        type: 'get',
        url: '/admin/resource/store',
        data: form.serialize(),
        success: function (data) {
            fetch_resource();
            $('#resource_add').modal("hide");
            status_success('Thêm thành công !');
        },
        error: function (error) {
            $('#resource_add').modal("hide");
            status_error('Có lỗi xảy ra vui lòng thử lại:');
        }
    });
});
