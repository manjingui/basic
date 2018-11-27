<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/11/21
 * Time: 17:32
 */
//knowledge


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

class KnowledgeController extends Controller
{
    public function actionList(){
        return $this->render('list');
    }
    public function actionDelivery(){
        return $this->render('delivery');
    }
}