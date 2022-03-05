window.drawPieChart = function drawPieChart(id, labels, title, data, colors) {
    var ctx = document.getElementById(id);
    var drawChart = new Chart(ctx, {
        type: "pie",
        data: {
            labels: labels,
            datasets: [
                {
                    label: title,
                    data: data,
                    backgroundColor: colors,
                    borderColor: "rgba(75,137,150,0)",
                    borderWidth: 1,
                    weight: 100,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                //公式ドキュメント通りに書いているがうまく行かない
                //https://www.chartjs.org/docs/latest/configuration/legend.html
                legend: {
                    display: true,
                    labels: {
                        color: "#black",
                    },
                },
            },
        },
    });
};
