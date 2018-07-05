<script type="text/javascript">
$(function () {
    $('#grafico').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: ''
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

</script>