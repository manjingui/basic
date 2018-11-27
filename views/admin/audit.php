
<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

?>
<link rel="stylesheet" href="css/list.css" type="text/css" media="screen">

<div class="expertbox">

    <div class="it_expert3">
        <div id="hot_ranks2">
            <ul class="current" style="display: block;">
                <li>
                    <?php
                    foreach ($models as $item){
                        ?>
                    <div class="it_expertxt_other">

                        <p class="it_experconter">
                            <?php
                            $typearr = array(
                                0 => '周边促销',
                                1 => '广场舞',
                                2 => '爬山',
                                3 => '下棋',
                                4 => '摄影',
                                5 => '旅游',
                                6 => '太极',
                                7 => '其他',
                                9=>'失物招领',
                                10=>'出售闲置',
                                11=>'房屋出租',
                            );
                            $zonearr = array(
                                0 => '润星家园',
                                1 => '美丽新世界',
                                2 => '其他',
                            );
                            echo  "<p>id：" .$item['id']."</p>";
                            echo "<p>活动类型：" .$typearr[$item['activity_type']] . "</p>";
                            echo "<p>活动小区：" . $zonearr[$item['activity_zone']]."</p>";
                            echo  "<p>活动地点：" .$item['activity_place']. "</p>";
                            echo  "<p>发起人：" .$item['activity_founder']."</p>";
                            echo  "<p>电话：" .$item['activity_phone']. "</p>";
                            echo  "<p>时间：" .$item['activity_st_time']. "至".$item['activity_et_time']."</p>";
//                            echo  "<p>" .$item['activity_et_time']. "</p>";
                            echo  "<p>内容：".$item['activity_summary']. "</p>";
                            echo '<a style="padding-left:15px;" href="index.php?r=admin/pass&id=' .$item['id'].'">通过</a>';
                            echo '<a style="padding-left:15px;" href="index.php?r=admin/reject&id=' .$item['id'].'">拒绝</a>';
                            ?></p>
                    </div>
                    <?php
                    }
                    ?>


                </li>
            </ul>
        </div>
    </div>
</div>
