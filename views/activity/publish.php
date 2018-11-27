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
?>
<!--<link rel="stylesheet" type="text/css" href="css/form-base.css">-->
<link rel="stylesheet" type="text/css" href="css/form-home.css">


<section class="aui-content">
    <!--    <div style="height:20px;"></div>-->


    <div class="aui-content-up">
        <form action="" name="form1" method="post">

            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    活动类型 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <select name="activity_type" class="aui-form-control-two">
                        <option value="0">周边促销</option>
                        <option value="9">失物招领</option>
                        <option value="11">房屋出租</option>

                        <option value="10">出售闲置</option>

                        <option value="1">广场舞</option>
                        <option value="2">爬山</option>
                        <option value="3">下棋</option>
                        <option value="4">摄影</option>
                        <option value="5">旅游</option>
                        <option value="6">太极</option>
                        <option value="7">其他</option>
                    </select>
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    活动小区 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <select name="activity_zone" class="aui-form-control-two">
                        <option value="0">润星家园</option>
                        <option value="1">美丽新世界</option>
                        <option value="2">其他</option>
                    </select>
                </div>
            </div>
            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    活动地点 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" maxlength="20" name="activity_place"  onblur="checkplace()" required id="1"
                           placeholder="">

                </div>
            </div>


            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    开始时间 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input class="aui-form-control-two" name="activity_st_time" onblur="checkst()" type="date" value=""/>
                </div>
            </div>

            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    结束时间 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input class="aui-form-control-two" name="activity_et_time" onblur="checket()" type="date" value=""/>
                </div>
            </div>


            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    发起人 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" name="activity_founder" onblur="checkfounder()" maxlength="6" required
                           id="1" placeholder="">

                </div>
            </div>


            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    联系电话 <em>*</em>
                </label>
                <div class="aui-form-input">
                    <input type="text" class="aui-form-control-two" name="activity_phone" onblur="validatephone()" id="2" placeholder="必须是11位手机号" required/>
<!--                    <span class="tips" id="phone">必须是11位的数字</span>-->
                </div>
            </div>

            <div class="aui-form-group clear">
                <label class="aui-label-control">
                    活动介绍<em>*</em>
                </label>
                <div class="aui-form-input">
                    <textarea class="aui-form-control" name="activity_summary" onblur="checksummary()" id="4" maxlength="40"
                              minlength="5"></textarea>
                </div>
            </div>

        </form>
    </div>


    <div class="re_regist_other">
        <a class="btn_regist" type="button" name="activity_publish">发布</a>
    </div>

</section>

<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>

<script type="text/javascript" src="js/publish.js"></script>

