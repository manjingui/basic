<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
$isLogin = Yii::$app->user->getIsGuest();
$userId = Yii::$app->user->getId();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

    <title>Home</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content=""/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/base.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/banner.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>

</head>


<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>



<div class="bannermjg">
    <div class="bannermjg-left">
        大爷大妈俱乐部


        <?php
        if ($isLogin == false) {
            ?>
            <a class="bannermjg-b" href="">退出</a>
            <a class="bannermjg-a" href="index.php?r=site/my">我的</a>

            <?php
        } else {
            ?>
            <a class="bannermjg-a" href="index.php?r=site/login">登录</a>
            <?php
        }
        if($isLogin == false && $userId == 1){
            ?>
            <a class="bannermjg-a" href="index.php?r=admin/audit">审核</a>
<!--            <a class="bannermjg-a" href="index.php?r=knowledge/delivery">发布</a>-->
<!--            http://10.252.187.139:8898/index.php?r=knowledge/delivery-->
            <?php
        }
        ?>
<!--        <a class="bannermjg-a" href="index.php?r=site/index">首页</a>-->
    </div>

    <ul id="nav">
        <li><a href="index.php?r=site/index">最新信息</a></li>
        <li><a href="index.php?r=activity/publishpage">发布信息</a></li>
<!--        <li><a href="index.php?r=activity/search">查询活动</a></li>-->
<!--        <li><a href="index.php?r=knowledge/list">朋友圈</a>-->
<!--            <ul>-->
<!--                <li><a href="http://www.script-tutorials.com/category/jquery/">jQuery</a></li>-->
<!--                <li><a href="http://www.script-tutorials.com/category/javascript/">JS</a></li>-->
<!--            </ul>-->
        </li>
<!--        <li><a href="index.php?r=forum/list">问答论坛</a></li>-->
    </ul>

    <?= $content ?>
</div>

<script type="text/javascript" src="js/main.js"></script>





