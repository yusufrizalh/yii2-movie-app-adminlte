<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\themes\adminLTE\components\ThemeNav;

?>
<?php $this->beginContent('@app/themes/adminLTE/layouts/main.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user_accounts.png" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>
                    <?php
                          $info[] = Yii::t('app','InixAdmin');

                          if(isset(Yii::$app->user->identity->username))
                              $info[] = ucfirst(\Yii::$app->user->identity->username);

                          echo implode(', ', $info);
                      ?>
                </p>
                <a><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php
                echo Menu::widget([
                  'encodeLabels'=>false,
                  'options' => [
                    'class' => 'sidebar-menu'
                  ],
                  'items' => [
                      ['label'=>Yii::t('app','NAVIGATION HERE'), 'options'=>['class'=>'header']],
                      ['label' => ThemeNav::link('Dashboard', 'fa fa-dashboard'), 'url' => ['site/index'], 
                       'visible'=>!Yii::$app->user->isGuest
                      ],
                      ['label' =>Yii::t('app', 'Manage'), 'options' => ['class' => 'header'],  'items' => [
                          ['label' => ThemeNav::link(' Customer', 'fa fa-dashboard'), 'url' => ['/customer/index']], 
                          ['label' => ThemeNav::link(' Movie', 'fa fa-dashboard'), 'items' => [
                              ['label' => ThemeNav::link(' Movie', 'fa fa-dashboard'), 'url' => ['/movie/index']],
                              ['label' => 'Download Movie', 'url' => ['/movie/export']],
                              ['label' => 'Import Movie', 'url' => ['/movie/import']], 
                              ['label' => 'Dynamic Data Chart', 'url' => ['/movie/chart']]
                          ]],
                          ['label' => ThemeNav::link(' Schedule', 'fa fa-dashboard'), 'url' => ['/schedule/index']],
                          ['label' => ThemeNav::link(' Booking', 'fa fa-dashboard'), 'items' => [
                                ['label' => 'Booking', 'url' => ['/booking/index']],
                                ['label' => 'Line Chart', 'url' => ['/booking/linechart']], 
                                ['label' => 'Column Chart', 'url' => ['/booking/columnchart']], 
                                ['label' => 'Pie Chart', 'url' => ['/booking/piechart']],
                                ['label' => 'Rating Chart', 'url' => ['/booking/jsonchart']],
                          ]], 
                          ['label' => ThemeNav::link(' Person', 'fa fa-dashboard'), 'items' => [
                                  ['label' => 'Person', 'url' => ['/person/index']], 
                                  ['label' => 'Gender Chart', 'url' => ['/person/genderchart']], 
                          ]],
                          ['label' => ThemeNav::link(' Login', 'fa fa-dashboard'), 'url' => ['/site/login']],
                          ['label' => ThemeNav::link(' Register', 'fa fa-dashboard'), 'url' => ['/site/register']],
                      ]], 
                  ],
                ]);
            ?>

    </section>
    <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> <?php echo Html::encode($this->title); ?> </h1>
        <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>
    </section><!-- /.content -->

</div><!-- /.right-side -->
<?php $this->endContent();