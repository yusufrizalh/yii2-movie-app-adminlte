var chartData = [];

function getData() {
    $.getJSON('https://api.myjson.com/bins/14nxki', function (data) {
        Highcharts.each(data, function (el) {
            el.x = new Date(el.month_amount).getTime();
            el.y = Number(el.amount);
            chartData.push(el);
        });
        chartData.sort(function (a, b) {
            return a.x - b.x
        });
        chart.series[0].setData(chartData);
    });
}


var chart = Highcharts.chart('container', {
    title: {
        text: 'Employee Score'
    },
    subtitle: {
        text: 'Source: api.myjson.com/bins/14nxki'
    },
    xAxis: {
        type: 'datetime'
    },
    yAxis: {
        title: {
            text: 'Score of Employees'
        }
    },
    chart: {
        type: 'line'
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart:
        }
    },
    series: [{
        data: [],
        name: 'Score',
    }]
});

getData();

//setInterval(getData, 5000);