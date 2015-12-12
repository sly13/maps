<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AdminAsset;
use yii\helpers\Html;

$this->title = 'Админка';

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php
    $this->registerCssFile('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
    $this->registerCssFile('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
    ?>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php $this->head() ?>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<?php $this->beginBody() ?>
    <div class="wrapper">
        <!-- Header menu-->
        <header class="main-header">
            <a href="<?= \yii\helpers\Url::to('/admin')?>" class="logo">
                <span class="logo-mini">BB<b>F</b></span>
                <span class="logo-lg">Blabla<b>Flat</b></span>
            </a>

            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Top Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <?= Html::img('@web/images/user.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <?= Html::img('@web/images/user.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <?= Html::img('@web/images/user.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <?= Html::img('@web/images/user.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <?= Html::img('@web/images/user.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- User Account -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <?= Html::img('@web/images/user.jpg', ['class' => 'user-image', 'alt' => 'User Image']) ?>
                                <span class="hidden-xs">Vadim Semenko</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-header">
                                    <?= Html::img('@web/images/user.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
                                    <p>
                                        Vadim Semenko - Web Developer
                                        <small>Member since Dec. 2015</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- End Top -->
            </nav>
        </header>

        <!-- Menu -->
        <aside class="main-sidebar">
            <section class="sidebar">
                <div class="user-panel">
                    <div class="pull-left image">
                        <?= Html::img('@web/images/user.jpg', ['class' => 'img-circle', 'alt' => 'User Image']) ?>
                    </div>
                    <div class="pull-left info">
                        <p>Vadim Semenko</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <ul class="sidebar-menu">
                    <li class="header">Панель управления</li>

                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Dashboard</span></a></li>

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Пользователи</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="index.html"><i class="fa fa-circle-o"></i> Тест 1</a></li>
                            <li class="active"><a href="index2.html"><i class="fa fa-circle-o"></i> Тест 2</a></li>
                        </ul>
                    </li>

                    <li class="header">LABELS</li>
                    <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
                    <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
                </ul>
            </section>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <h1>Dashboard<small>Version 1.0</small></h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <section class="content">
                <?= $content ?>
            </section>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2015-2016 <a href="http://vk.com/id195022348" target="_blank">Vadim Semenko</a>.</strong> All rights reserved.
        </footer>
    </div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
