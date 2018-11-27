<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/11/20
 * Time: 10:11
 */
use yii\helpers\Html;

?>

<div class="bg_bank">
    <div class="re_min_infor">
        <div class="bg_color">
            <div class="re_min">
                <input class="input01" id="phone" name="phonenumber" type="text" placeholder="手机" pattern="(\d{11})|^((\d{7,8})|(\d{4}|\d{3})-(\d{7,8})|(\d{4}|\d{3})-(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1})|(\d{7,8})-(\d{4}|\d{3}|\d{2}|\d{1}))$" />
            </div>

            <div class="re_min">
                <input class="input01"  class="login_btn" id="code" name="code" type="text" placeholder="请输入验证码"/>
                <input class="reto_code" type="button" id="btn" name="sendcode" value="发送验证码"/>
            </div>
        </div>
        <div class="re_regist">
            <a class="btn_regist" type="button" id="login" name="login">登录</a>
        </div>
    </div>
</div>

<script type="text/javascript" src="js/jquery-1.11.3.min.js" ></script>
<script type="text/javascript" src="js/index.js" ></script>
