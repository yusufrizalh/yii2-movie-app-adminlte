<?php
use \miloschuman\highcharts\Highcharts;

echo Highcharts::widget([
    'options' => [
        'title' => ['text' => 'Booking Movie Share'], 
        'series' => [
            [
                'type' => 'pie', 
                'name' => 'Movie', 
                'data' => $movie_data, 
            ]
        ],
    ]
]);
?>