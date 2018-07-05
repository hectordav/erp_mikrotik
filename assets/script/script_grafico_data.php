<script type="text/javascript">
$(function () {
    $('#grafico').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Conexiones por Dia'
        },

        xAxis: {
            categories: <?= $series_data1;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Registradas',
            data: <?= $series_data2;?>

        }]
    });
});

$(function () {
    $('#graf_colum').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Conexiones por equipo'
        },

        xAxis: {
            categories: <?= $series_data3;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Registradas',
            data: <?= $series_data4;?>

        }]
    });
});

$(function () {
    $('#graf_col_2').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Conexiones por meses'
        },

        xAxis: {
            categories: <?= $series_data5;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Registrados',
            data: <?= $series_data6;?>

        }]
    });
});
$(function () {
    $('#graf_col_3').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Conexiones por horas'
        },

        xAxis: {
            categories: <?= $series_data7;?>,
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Cantidad'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Registrados',
            data: <?= $series_data8;?>

        }]
    });
});

</script>