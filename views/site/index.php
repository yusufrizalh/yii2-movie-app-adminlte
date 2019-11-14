<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-block btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
        
        <p><a class="btn btn-lg btn-block btn-danger" href="<?= Url::to(['site/logout'])?>">Logout</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            
        </div>

    </div>
</div>
