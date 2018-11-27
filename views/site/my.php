<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

$isLogin = Yii::$app->user->getIsGuest();
$userId = Yii::$app->user->getId();
?>

<!--<link rel="stylesheet" href="css/banner.css" type="text/css" media="screen">-->
<link rel="stylesheet" href="css/list.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="css/form-home.css">
<!--<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>-->

<!--<script type="text/javascript" src="js/jquery.1.8.3.js"></script>-->


<script type="text/javascript" src="js/js-extend.js"></script>
<script type="text/javascript" src="js/pager.js"></script>

<div class="servicemjg">



    <div class="aui-form-group-other clear">


        <div class="aui-label-control-other">
            <label style="float:left;margin-left: 10px;">
                帖子状态
            </label>
            <div class="aui-form-input">
                <select name="activity_status" onchange="changeselect()" class="aui-form-control-two-other">
                    <option value="8">所有</option>
                    <option value="0">已失效</option>
                    <option value="1">审核中</option>
                    <option value="2">已发布</option>
                    <option value="3">审核未通过</option>
                </select>
            </div>
        </div>
    </div>


    <div class="expertbox">

        <div class="it_expert3">
            <div id="hot_ranks2">
                <ul class="current" style="display: block;">
                    <li class="latestlist">

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div  style="border: 1px solid #b3cef9;font-size:15px; margin-bottom: 5px;" id="pager"></div>

</div>




<script type="text/javascript">

    window.onload = function ()//用window的onload事件，窗体加载完毕的时候
    {
        page();
    };

    function changeselect() {
        page();
    }


    function page() {

        let activity_status = '';
        activity_status = $('[name=activity_status]').val();


        $("#pager").sjAjaxPager({
            url: `index.php?r=site/mylist`,
            pageSize: 5,
            searchParam: {
                type: activity_status,
                // zone: activity_zone
            },
            beforeSend: function () {
            },
            success: function (data) {
                console.log(data);
                var items = data['items'];
                var str = "";
                for (var i = 0, It = items.length; i < It; i++) {//循环
                    var temp1 = '<p>活动类型：' + items[i].activity_type +'</p>';
                    var temp2 ='<p>活动小区：' + items[i].activity_zone +'</p>';
                    var temp3 ='<p>活动地点：' + items[i].activity_place +'</p>';
                    var temp4 ='<p>活动时间：' + items[i].activity_st_time + '至' + items[i].activity_et_time + '</p>';
                    var temp5 ='<p>活动发起人：' + items[i].activity_founder +'</p>';
                    var temp6 ='<p>发起人联系方式：' + '<a href="tel:' + items[i].activity_phone + '">' +items[i].activity_phone + '</a>' +'</p>';
                    var temp7 ='<p>活动内容：' + items[i].activity_summary +'</p>';
                    var temp8 ='<p>发布时间：' + items[i].publish_time +'</p>';
                    if(items[i].is_delete == 1){
                        var temp9 = '<p>帖子状态：已过期</p>';
                    }else{
                        if(items[i].is_pass == 0){
                            temp9 = '<p>帖子状态：审核中</p>';
                        }
                        if(items[i].is_pass == 1){
                            temp9 = '<p>帖子状态：审核通过，已发布</p>';
                        }
                        if(items[i].is_pass == 2){
                            temp9 = '<p>帖子状态：审核未通过</p>';
                        }
                    }
                    // var temp9 ='<p>信息状态：' + items[i].activity_summary +'</p>';

                    str += '<div class="it_expertxt_my">' + temp1 + temp2 + temp3 + temp4 + temp5 + temp6 + temp7 + temp8 + temp9 + '</div>';
                }

                $(".latestlist").empty().append(str)//遍历在界面上

            },
            complete: function () {
            }
        });
    }


</script>




