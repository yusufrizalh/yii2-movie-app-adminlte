<?php
use \miloschuman\highcharts\Highcharts; 
// use dosamigos\highcharts\HighCharts;

$this->title = 'Data Rating Film';
foreach($dgrafik as $values) {
    $a[0] = ($values['title']);
    //$a[0] = ($values['gender']);
    $c[] = ($values['title']);
    //$c[] = ($values['gender']);
    $b[] = array('type' => 'column', 'name' => $values['title'], 'data' => array((double)$values['rating']));
}

echo Highcharts::widget([
    'options' => [
         'chart'=>[
            'type'=>'column'
         ],
         'title' => ['text' => 'Data Rating Film'],
         'xAxis' => [
            'categories' => ['Judul Film']
         ],
         'yAxis' => [
            'title' => ['text' => 'Rating Film']
         ],
         'series' => $b
      ]
])

/*
echo Highcharts::widget([
    'options' => [
        'title' => [
            ['text' => 'Movie Rating'], 
        ],
        'subtitle' => [
            'text' => ['Source: table movie'], 
        ],
        'xAxis' => [
            'categories' => ['Jumlah'],
        ],
        'yAxis' => [
            'title' => [
                'text' => 'Rating of Movie'
            ]
        ],
        'chart' =>  [
            'type' =>  'bar'
        ],
        'legend' =>  [
            'layout' =>  'vertical',
            'align' =>  'right',
            'verticalAlign' =>  'middle'
        ],
        'plotOptions' =>  [
            'series' =>  [
                'label' =>  [
                    'connectorAllowed' =>  false
                ],
                'pointStart' => [], 
            ], 
        ],
        
        'series' =>  [[
            'data' =>  [$b],
            'name' =>  'Rating',
        ]]
    ]
]);*/

?>