<?php
namespace app\assets;

use yii\web\AssetBundle;

class JsAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [];
    public $js = [
      //'/js/jquery.simplyCountable.js',
        '/js/jsonchart.js', 
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
?>