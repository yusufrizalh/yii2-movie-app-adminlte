<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\themes\adminLTE\assets\AdminlteAsset;
/* @var $this \yii\web\View */
/* @var $content string */
AdminlteAsset::register($this);
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="skin-blue sidebar-mini">

<?php $this->beginBody() ?>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="<?= Yii::$app->request->baseUrl; ?>" class="logo">
              <!-- mini logo for sidebar mini 50x50 pixels -->
              <span class="logo-mini"><b>A</b>LT</span>
              <!-- logo for regular state and mobile devices -->
              <span class="logo-lg"><b>Inixindo </b>Surabaya</span>
            </a>

            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
              <!-- Sidebar toggle button-->
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar">A</span>
                <span class="icon-bar">B</span>
                <span class="icon-bar">C</span>
              </a>
              <div class="navbar-custom-menu">
                  <?php
                    $isGuest = Yii::$app->user->isGuest;
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-left'], 
                        'items' => [
                            [
                                'label' => 'Home', 'url' => ['/site/index']
                            ], 
                            [
                                'label' => 'Manage', 
                                    'items' => [
                                    [
                                        'label' => 'Customer', 'url' => ['/customer/index']
                                    ], 
                                    [
                                        'label' => 'Movie', 
                                        'items' => [
                                            [
                                                'label' => 'Movie', 'url' => ['/movie/index']
                                            ], 
                                            [
                                                'label' => 'Download Movie', 'url' => ['/movie/export']
                                            ],
                                            [
                                                'label' => 'Import Movie', 'url' => ['/movie/import']
                                            ], 
                                            [
                                                'label' => 'Dynamic Data Chart', 'url' => ['/movie/chart']
                                            ]
                                        ]
                                    ], 
                                    [
                                        'label' => 'Schedule', 'url' => ['/schedule/index']
                                    ], 
                                    [
                                        'label' => 'Booking', 
                                        'items' => [
                                            [
                                                'label' => 'Booking', 'url' => ['/booking/index']
                                            ], 
                                                '<li class="divider"></li>', 
                                                '<li class="dropdown-header">Pilihan Chart</li>', 
                                            [
                                                'label' => 'Line Chart', 'url' => ['/booking/linechart']
                                            ], 
                                            [
                                                'label' => 'Column Chart', 'url' => ['/booking/columnchart']
                                            ], 
                                            [
                                                'label' => 'Pie Chart', 'url' => ['/booking/piechart']
                                            ], 
                                        ]
                                    ], 
                                    [
                                        'label' => 'Person', 'url' => ['/person/index']
                                    ], 
                                    ]
                            ], 
                            [
                                'label' => 'Login', 'url' => ['/site/login']
                            ],
                            [
                                'label' => 'Register', 'url' => ['/site/register']
                            ],
                        ]
                    ]);
                  ?>
              </div>
            </nav>

        </header>

        <?= $content ?>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <!--<?php echo Yii::powered(); ?>-->
            </div>
            Copyright &copy; <?php echo date('Y'); ?> by Inixindo Surabaya.
        </footer>

    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
