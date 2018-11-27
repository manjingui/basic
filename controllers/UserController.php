<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/25
 * Time: 18:25
 */
namespace app\controllers;

use app\models\Book;
use app\models\BookForm;
use app\models\Borrow;
use app\models\ErrCode;
use app\models\LoginNewForm;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class UserController extends Controller
{


    public function actionLogin(){
        return $this->render('login');
//        $request = Yii::$app->request;
//        $phone = $request->post('phone', '');
//        if (empty($phone)) {
//            $this->codeReturn(ErrCode::ERROR_PARAMS);
//        }
    }

    public function actionSendcode(){

        $request = Yii::$app->request;
        $phone = $request->get('phone', '');
        $code = $request->get('code', '');


        $model = new LoginNewForm();
        $model->setCode($code);
        $model->setPhone($phone);
         $model->login() ;


    }

    public function actionCheckcode(){
        $this->codeReturn(ErrCode::SUCESS_CODE);
    }

    public function actionBorrow()
    {
        $request = Yii::$app->request;
        $bookId = $request->get('book_id', '');
        if (empty($bookId)) {
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $bookInfo = Book::findOne($bookId);
        if (empty($bookInfo)) {
            $this->codeReturn(ErrCode::ERROR_BOOK_NO_EXIST);
        }
        if($bookInfo->is_delete == 1 || $bookInfo->borrow_status == 2){
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $userId = "123";
        $borrow = new Borrow();
        $borrow->user_id = $userId;
        $borrow->book_id = $bookId;
        $borrow->borrow_time = time();
        $borrow->expire_time =  time() + 24 * 3600 * 14;
        $borrow->borrow_status = 1;
        $borrow->save();

        $bookInfo->borrow_status = 2;
        $bookInfo->update();

        $this->codeReturn(ErrCode::SUCESS_CODE);
    }

    public function actionCancel()
    {
        $request = Yii::$app->request;
        $bookId = $request->get('book_id', '');
        if (empty($bookId)) {
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $bookInfo = Book::findOne($bookId);
        if (empty($bookInfo)) {
            $this->codeReturn(ErrCode::ERROR_BOOK_NO_EXIST);
        }
        if($bookInfo->is_delete == 1 || $bookInfo->borrow_status != 2){
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $userId = "123";
        $borrow =  Borrow::find()->select(["*"])->where(["=","user_id",$userId])->andWhere(["=","book_id",$bookId])->andWhere(["=","borrow_status",1])->one();
        if(empty($borrow)){
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $borrow->borrow_status = 2;
        $borrow->cancel_time = time();
        $borrow->update();
        $this->codeReturn(ErrCode::SUCESS_CODE);
    }



    public function codeReturn($code, $selfinfo = '', $arr = array())
    {

        $res = array(
            'errorno' => $code,
            'errormsg' => ErrCode::$ERROR_INFO[$code],
            'data' => $arr
        );
        echo json_encode($res);
        exit;
    }
}