$(document).on("ready", function () {
    $("#project-d").on("change", function () {
        var id = $(this).find(":selected").val();
        // console.log(id)

        $("#year").html("");
        $.ajax({
            url: "/admin/Dashboard/get-year/" + id,
            type: "get",
            success: function (data) {
                // console.log(data)

                $.each(data, function (key, value) {
                    console.log(value);
                    if (
                        value.Time_deployment_start ===
                        value.Time_deployment_end
                    ) {
                        $("#year").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.Time_deployment_end +
                                "</option>"
                        );
                    } else {
                        $("#year").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.Time_deployment_start +
                                "</option>"
                        );
                        $("#year").append(
                            '<option value="' +
                                value.id +
                                '">' +
                                value.Time_deployment_end +
                                "</option>"
                        );
                    }
                });
            },
        });
    });
});
