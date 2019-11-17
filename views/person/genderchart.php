<?php
use \miloschuman\highcharts\Highcharts; 
// use dosamigos\highcharts\HighCharts;

$this->title = 'Data Jumlah Gender';
foreach($dgrafik as $values) {
    $a[0] = ($values['gender']);
    $c[] = ($values['gender']);
    $b[] = array('type' => 'column', 'name' => $values['gender'], 'data' => array((double)$values['jumlah']));
}

echo Highcharts::widget([
    'options' => [
         'chart'=>[
            'type'=>'column'
         ],
         'title' => ['text' => 'Data Gender'],
         'xAxis' => [
            'categories' => ['Jenis Gender']
         ],
         'yAxis' => [
            'title' => ['text' => 'Jumlah Gender']
         ],
         'series' => $b
      ]
]);

?>