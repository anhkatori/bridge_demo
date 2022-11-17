$(document).ready(function () {
    if ($("#lineChart").length) {
        var xValues = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "June",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];

        new Chart("lineChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [
                    {
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#FF6384",
                        borderColor: "#FF6384",
                        data: [
                            -70, -30, 70, 59, 30, 88, 50, 80, -100, -60, -65,
                            55,
                        ],
                    },
                    {
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#FFCE58",
                        borderColor: "#FFCE58",
                        data: [
                            80, 70, 5, -3, -36, -30, -87, -50, 0, 75, 68, -10,
                        ],
                    },
                ],
            },
            options: {
                legend: { display: false },
                scales: {
                    beginAtZero: true,
                },
            },
        });
    }

    if ($("#chartBar").length) {
        var xValues = [
            "Jan",
            "Feb",
            "Mar",
            "Apr",
            "May",
            "June",
            "Jul",
            "Aug",
            "Sep",
            "Oct",
            "Nov",
            "Dec",
        ];

        new Chart("chartBar", {
            type: "bar",
            data: {
                labels: xValues,
                datasets: [
                    {
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#3E79F7",
                        borderColor: "#3E79F7",
                        data: [
                            875, 120, 300, 500, 600, 0, 900, 250, 230, 120, 612,
                            504,
                        ],
                    },
                    {
                        fill: false,
                        lineTension: 0,
                        backgroundColor: "#B2DF8A",
                        borderColor: "#B2DF8A",
                        data: [
                            800, 700, 500, 300, 360, 300, 87, 500, 100, 750,
                            680, 109,
                        ],
                    },
                ],
            },
            options: {
                legend: { display: false },
                scales: {
                    yAxes: [{ ticks: { min: 0, max: 1000, stepSize: 250 } }],
                    
                },
            },
        });
    }
});
