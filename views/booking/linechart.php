<?php
use \miloschuman\highcharts\Highcharts; 

echo Highcharts::widget([
        'options' => [
            'chart' => ['type' => 'line' /* column */], 
            'title' => ['text' => 'Booking Tickets Growth'], 
            'xAxis' => [
                'categories' => ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
                                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            ], 
            'yAxis' => [
                'title' => ['text' => 'Total Booking']
            ], 
            'series' => [
                ['name' => 'Booking', 'data' => [37, 78, 46, 85, 90, 104, 58, 63, 88, 26, 11, 80]], 
            ],
        ]
    ]);
?>