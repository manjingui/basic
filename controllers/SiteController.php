<?php

namespace app\controllers;

use app\models\LoginNewForm;
use app\models\UserDB;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //$this->layout = false;
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {

        $isGuest = Yii::$app->user->getIsGuest();
        if($isGuest == false){
            $this->redirect(array('site/index'));
        }
        $request = Yii::$app->request;
        $phone = $request->get('phone', '');
        $code = $request->get('code', '');

        if(empty($phone) || empty($code)){
            return $this->render('login');
        }

        //校验验证码 通过 存入数据库
        $userInfo  = (new Query()) -> from('user')->where(['=','username',$phone])->one();
        if(empty($userInfo)){
            $user = new UserDB();
            $user->username = $phone;
            $user->authKey = $phone.'_authkey';
            $user->accessToken = $phone.'_token';
            $user->save();
        }

        $model = new LoginNewForm();
        $model->setCode($code);
        $model->setPhone($phone);
        if ($model->login()) {
            $res = array(
                'errorno' => 0,
                'errormsg' => '',

            );
            echo json_encode($res);
            exit;
        }
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        $res = array(
            'errorno' => 0,
            'errormsg' => '',

        );
        echo json_encode($res);
        //$this->redirect(array('site/index'));
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        var_dump(Yii::$app->user->getIsGuest());
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }


    public function actionMy(){
        return $this->render('my');
    }

    public function actionMylist(){
        $isGuest = Yii::$app->user->getIsGuest();
        if($isGuest == true){
            return '';
        }
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

        $userId = Yii::$app->user->getId();

        $type = (!isset($params['type'])) ? 8 : $params['type'];

        $query = (new Query())->from('activity')->where(["=","publish_user_id",$userId]);
        $queryother = (new Query())->from('activity')->where(["=","publish_user_id",$userId]);
        if($type == 0){
            $query->andWhere(["=","is_delete",1]);
            $queryother->andWhere(["=","is_delete",1]);
        }elseif($type == 1){
            $query->andWhere(["=","is_delete",0])->andWhere(["=","is_pass",0]);
            $queryother->andWhere(["=","is_delete",0])->andWhere(["=","is_pass",0]);
        }elseif($type == 2){
            $query->andWhere(["=","is_delete",0])->andWhere(["=","is_pass",1]);
            $queryother->andWhere(["=","is_delete",0])->andWhere(["=","is_pass",1]);
        }elseif($type == 3){
            $query->andWhere(["=","is_delete",0])->andWhere(["=","is_pass",2]);
            $queryother->andWhere(["=","is_delete",0])->andWhere(["=","is_pass",2]);
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
}
