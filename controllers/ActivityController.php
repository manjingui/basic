<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/11/21
 * Time: 11:05
 */

namespace app\controllers;

use app\models\Activity;
use app\models\ActivityForm;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\data\Pagination;

class ActivityController extends Controller
{

    public function actionQuery()
    {
        $id = Yii::$app->request->get('id', '');

        $info = (new Query())->from('activity')->having(['=', 'id', $id])->one();
        return $this->render('detail', ['id' => $id]);
    }

//<option value="0">周边促销</option>
//<option value="1">广场舞</option>
//<option value="2">爬山</option>
//<option value="3">下棋</option>
//<option value="4">摄影</option>
//<option value="5">旅游</option>
//<option value="6">太极</option>
//<option value="7">其他</option>
    public function actionLatest()
    {
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
        $params = Yii::$app->request->post();
        $pageIndex = (!isset($params['pageIndex']) || empty($params['pageIndex'])) ? 1 : $params['pageIndex'];
        $pageSize = (!isset($params['pageSize']) || empty($params['pageSize'])) ? 10 : $params['pageSize'];
        $type = (!isset($params['type'])) ? 8 : $params['type'];
        $zone = (!isset($params['zone'])) ? 8 : $params['zone'];
        $query = (new Query())->from('activity')->where(["=", "is_delete", 0])->andWhere(["=","is_pass",1]);
        $queryother = (new Query())->from('activity')->where(["=", "is_delete", 0])->andWhere(["=","is_pass",1]);
        if ($type != 8) {
            $query->andWhere(["=", "activity_type", $type]);
            $queryother->andWhere(["=", "activity_type", $type]);
        }

        if ($zone != 8) {
            $query->andWhere(["=", "activity_zone", $zone]);
            $queryother->andWhere(["=", "activity_zone", $zone]);
        }

        $count = $query->select("count(*) as num")->all()[0]['num'];
        $info = $queryother->orderBy("id desc")->offset(($pageIndex - 1) * $pageSize)->limit($pageSize)->all();
        $result = array();
        if (!empty($info)) {
            foreach ($info as $item) {
                $item['activity_type'] = $typearr[$item['activity_type']];
                $item['activity_zone'] = $zonearr[$item['activity_zone']];
                $result[] = $item;
            }

        }
        $ret = array();
        $ret['total'] = $count;
        $ret['items'] = $result;
        echo json_encode($ret);
    }

    public function actionPublish()
    {

        $isGuest = Yii::$app->user->getIsGuest();
        if ($isGuest == true) {
            $res = array(
                'errorno' => 1,
                'errormsg' => '',

            );
            echo json_encode($res);
            exit;
        }
        $userId = Yii::$app->user->getId();
        $postParams = Yii::$app->request->post();
        //$postParams = json_decode($postParams,true);
        $activity = new Activity();
        $activity->activity_type = $postParams['activity_type'];
        $activity->activity_place = $postParams['activity_place'];
        $activity->activity_zone = $postParams['activity_zone'];
        $activity->activity_st_time = $postParams['activity_st_time'];
        $activity->activity_et_time = $postParams['activity_et_time'];
        $activity->activity_founder = $postParams['activity_founder'];
        $activity->activity_phone = $postParams['activity_phone'];
        $activity->activity_summary = $postParams['activity_summary'];
        $activity->publish_time = date('Y-m-d H:i:s');
        $activity->publish_user_id = $userId;
        $activity->save();

        $res = array(
            'errorno' => 0,
            'errormsg' => '',

        );
        echo json_encode($res);
        exit;

    }

    public function actionPublishpage()
    {
        $isGuest = Yii::$app->user->getIsGuest();
        if ($isGuest == true) {
            return $this->render('login');
        }
        return $this->render('publish');
    }
}