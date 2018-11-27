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

class QuanziController extends Controller
{
    public function actionList(){
        return $this->render('list');
    }
    public function actionDelivery(){
        return $this->render('delivery');
    }

    public function actionPublish(){
        $file = $_FILES['file'];//得到传输的数据

        $name = $file['name'];
        $type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
        $allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型

        if(!in_array($type, $allow_type)){
            //如果不被允许，则直接停止程序运行
            return '';
        }

        if(!is_uploaded_file($file['tmp_name'])){
            //如果不是通过HTTP POST上传的
            return '';
        }
        $upload_path = "./upload/"; //上传文件的存放路径

        if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
            echo "Successfully!";
        }else{
            echo "Failed!";
        }

    }

}