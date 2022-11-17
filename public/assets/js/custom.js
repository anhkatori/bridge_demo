$(document).ready(function () {
    $('#nav-title').html($('ul#menu-sidebar').find('li.active').find('a').text());
    $("#datepicker-from, #datepicker-to ").datetimepicker({
        format: "DD-MM-YYYY HH:mm:ss",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down",
        },
    });

    $("#datepicker-birthday").datetimepicker({
        format: "DD-MM-YYYY",
    });

    $("#only-time").datetimepicker({
        pickDate: false,
        format: "HH:mm:ss",
    });

    $('input[name="startDate"]').daterangepicker({
        locale: {
            format: "DD/MM/YYYY",
        },
    });
    $("#daterangepicker").daterangepicker(
        {
            ranges: {
                Today: [moment(), moment()],
                Yesterday: [
                    moment().subtract(1, "days"),
                    moment().subtract(1, "days"),
                ],
                "Last 7 Days": [moment().subtract(6, "days"), moment()],
                "Last 30 Days": [moment().subtract(29, "days"), moment()],
                "This Month": [
                    moment().startOf("month"),
                    moment().endOf("month"),
                ],
                "Last Month": [
                    moment().subtract(1, "month").startOf("month"),
                    moment().subtract(1, "month").endOf("month"),
                ],
            },
            alwaysShowCalendars: true,
            startDate: $("#daterangepicker").attr("startDate"),
            endDate: $("#daterangepicker").attr("endDate"),
            locale: {
                format: "DD/MM/YYYY",
            },
        },
    );
    $('#only_day').datepicker( {
        format: "mm/yyyy",
        startView: "months",
        minViewMode: "months",
    });
    $('#only_day2').datepicker( {
        format: "mm/yyyy",
        startView: "months",
        minViewMode: "months",
    });
    $('#time_salary').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        opens: 'center',
        locale: {
            format: "DD/MM/YYYY",
        },

    });
    $('#time_salary_edit').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        opens: 'center',
        locale: {
            format: "DD/MM/YYYY",
        },

    });
    $('#time_insurance').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        opens: 'center',
        locale: {
            format: "DD/MM/YYYY",
        },
    });
    $('#time_insurance_edit').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true,
        opens: 'center',
        locale: {
            format: "DD/MM/YYYY",
        },
    });
    // $('#only_day2').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     opens: 'center',
    //     locale: {
    //         format: "DD/MM/YYYY",
    //     },

    // });
    // $('#only_day3').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     opens: 'center',
    //     locale: {
    //         format: "DD/MM/YYYY",
    //     },

    // });
    // $('#only_day4').daterangepicker({
    //     singleDatePicker: true,
    //     showDropdowns: true,
    //     opens: 'center',
    //     locale: {
    //         format: "DD/MM/YYYY",
    //     },

    // });


    $("<div id='tooltip'></div>")
        .css({
            position: "absolute",
            //display: "none",
            padding: "10px 20px",
            "background-color": "#ffffff",
            "z-index": "99999",
        })
        .appendTo("body");

    $("#my-select").multiSelect();
    $(".multiselect").multiSelect();
    // $('#lightgallery').lightGallery();
    $(".clockpicker").clockpicker({
        autoclose: true,
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
});
