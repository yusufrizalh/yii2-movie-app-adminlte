<?php
use \miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Booking Movie Share'], 
        'series' => [
            [
                'type' => 'pie', 
                'name' => 'Movie', 
                'data' => [
                    ['Gundala', 45], 
                    ['Warkop DKI Reborn', 26], 
                    ['Others', 29]
                ],
            ]
        ],
    ]
]);
?>
