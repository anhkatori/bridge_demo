window.onbeforeunload = function () {
    localStorage.clear();
};
let $title = $("#title").val();

let $checkList = [];
let $total = $("#total").val();

function re_check() {
    //check lại các checked checkbox
    if (localStorage.getItem("checkedAll") == "1") {
        $("#checkAll").prop("checked", true);
        $("input[name=checkEach]").prop("checked", true);
    } else {
        $("#checkAll").prop("checked", false);
    }
    checkList = JSON.parse(localStorage.getItem("checkList") || "[]");
    for (var i = 0; i < checkList.length; i++) {
        $("input[data-id=" + checkList[i] + "]").prop('checked', true);
    };
}

function fetch_data() {
    if ($("#search").val() != "") {
        fetch_results();
    } else {
        $perPage = $("#value_page").val();
        $numPage = localStorage.getItem("numPage");
        $.ajax({
            global: false,
            url: "/admin/" + $title + "/render?page=" + $numPage,
            data: {
                perPage: $perPage,
            },
            success: function (data) {
                $("#data-" + $title).html(data);
                re_check();
            },
        });
    }
}

//////////Search//////////

var search = debounce(function (e) {
    $value = $("#search").val();
    $perPage = $("#value_page").val();
    ajaxsearch();
}, 300);

$(document).on("keydown", "#search", search);

function ajaxsearch() {
    $.ajax({
        type: "get",
        url: "/admin/" + $title + "/search",
        data: {
            search: $value,
            perPage: $perPage,
        },
        success: function (data) {
            $("#data-" + $title).html(data);
            $("#pagination_all").hide();
            $("#pagination_search").removeClass("hidden");
            re_check();
        },
    });
}

function fetch_results($numPage) {
    // alert(localStorage.getItem('checkList'))
    $value = $("#search").val();
    $number = $("#value_page").val();
    $.ajax({
        global: false,
        type: "get",
        url: "/admin/" + $title + "/search?page=" + $numPage,
        data: {
            search: $value,
            perPage: $number,
        },
        success: function (data) {
            $("#data-" + $title).html(data);
            $("#pagination_all").hide();
            $("#pagination_search").removeClass("hidden");
            re_check();
        },
    });
}
$(document).on("click", "#pagination_search a", function (event) {
    event.preventDefault();
    $numPage = $(this).attr("href").split("page=")[1];
    fetch_results($numPage);
});

////////////  Check ///////////

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
function check_number_of_checkbox() {
    if ($(":checkbox:checked").length > 1) {
        enable_delete_button();
    }
    else {
        disable_delete_button();
    }
};

$(document).on('click', "#checkAll", function () {
    localStorage.removeItem("checkList");
    if ($(this).is(":checked")) {
        $('input:checkbox').not(this).prop('checked', true);
        localStorage.setItem('checkedAll', '1')
        $.ajax({
            global: false,
            type: "get",
            url: "/admin/" + $title + "/getAllID",
            success: function (data) {
                localStorage.setItem("checkList", JSON.stringify(data.id));
            },
        });
    } else {
        $('input:checkbox').not(this).prop('checked', false);
        localStorage.setItem('checkedAll', '0');
    }
    check_number_of_checkbox();
});

$(document).on("change", "#checkEach", function () {
    $checkList = JSON.parse(localStorage.getItem("checkList") || "[]");
    if ($(this).is(":checked")) {
        if ($checkList.indexOf($(this).attr("data-id")) == -1) {
            $checkList.push(Number($(this).attr("data-id")));
        }
    } else { 
        $checkList.splice(
            $checkList.indexOf(Number($(this).attr("data-id"))),
            1
        );
    }
    localStorage.setItem("checkList", JSON.stringify($checkList));
    if ($checkList.length > 0) {
        enable_delete_button();
    } else {
        disable_delete_button();
    }
    if ($checkList.length == $total) {
        $("#checkAll").prop("checked", true);
        localStorage.setItem("checkedAll", "1");
    } else {
        $("#checkAll").prop("checked", false);
        localStorage.setItem("checkedAll", "0");
    }
});

////////// Delete Multiples //////////////

$(document).on("click", "#delete_button", function () {
    $checkList = JSON.parse(localStorage.getItem("checkList") || "[]");
    if (
        confirm("Are you sure to delete " + $checkList.length + " records ?") ==
        true
    ) {
        let $href = "/admin/" + $title + "/destroy/" + $checkList;
        // alert($href)
        $.ajax({
            type: "get",
            url: $href,
            success: function () {
                fetch_data();
                disable_delete_button();
                status_success(
                    "Xóa thành công " + $checkList.length + " records !"
                );
            },
            error: function (error) {
                status_error("Lỗi:" + error);
            },
        });
        localStorage.removeItem("checkList");
    }
});

//////////Change number of records per page//////////

$(document).on("change", "#value_page", function (event) {
    if ($("#search").val() == "") {
        fetch_data();
    } else fetch_results();
});

//////////Pagination all//////////

$(document).on("click", "#pagination_all a", function (event) {
    event.preventDefault();
    $numPage = $(this).attr("href").split("page=")[1];
    localStorage.setItem("numPage", $numPage);
    fetch_data();
    // alert(localStorage.getItem('checkList'));
});
