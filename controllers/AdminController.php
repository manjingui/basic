<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/24
 * Time: 14:14
 */

namespace app\controllers;

use app\models\Activity;
use app\models\Book;
use app\models\BookForm;
use app\models\ErrCode;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class AdminController extends Controller
{

    public function actionPass(){
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
        if($userId != 1){
            $res = array(
                'errorno' => 1,
                'errormsg' => '',

            );
            echo json_encode($res);
            exit;
        }
        $request = Yii::$app->request;
        $id = $request->get('id', '');
        $info  = Activity::findOne($id);
        if(!empty($info)){
            $info->is_pass = 1;
            $info->update();
        }

        $queryother = (new Query())->from('activity')->where(["=", "is_delete", 0])->andWhere(["=","is_pass",0])->limit(30)->all();
//        var_dump($queryother);
        return $this->render('audit',['models' => $queryother]);
    }


    public function actionReject(){
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
        if($userId != 1){
            $res = array(
                'errorno' => 1,
                'errormsg' => '',

            );
            echo json_encode($res);
            exit;
        }
        $request = Yii::$app->request;
        $id = $request->get('id', '');
        $info  = Activity::findOne($id);
        if(!empty($info)){
            $info->is_pass = 2;
            $info->update();
        }

        $queryother = (new Query())->from('activity')->where(["=", "is_delete", 0])->andWhere(["=","is_pass",0])->limit(30)->all();
//        var_dump($queryother);
        return $this->render('audit',['models' => $queryother]);
    }

    public function actionAudit(){
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
        if($userId != 1){
            $res = array(
                'errorno' => 1,
                'errormsg' => '',

            );
            echo json_encode($res);
            exit;
        }
        $queryother = (new Query())->from('activity')->where(["=", "is_delete", 0])->andWhere(["=","is_pass",0])->limit(30)->all();
//        var_dump($queryother);
        return $this->render('audit',['models' => $queryother]);
    }



    public function actionPutonbook()
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
        $bookInfo->book_status = 1;
        $bookInfo->is_delete = 0;
        $bookInfo->update();
        $this->codeReturn(ErrCode::SUCESS_CODE);

    }


    public function actionDeletebook()
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
        $bookInfo->book_status = 3;
        $bookInfo->is_delete = 1;
        $bookInfo->update();
        $this->codeReturn(ErrCode::SUCESS_CODE);

    }


    public function actionEditbook()
    {
        $request = Yii::$app->request;
        $bookId = $request->post('book_id', '');
        if (empty($bookId)) {
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $bookInfo = Book::findOne($bookId);
        if (empty($bookInfo)) {
            $this->codeReturn(ErrCode::ERROR_BOOK_NO_EXIST);
        }

        $bookName = $request->post('book_name', '');
        $bookClassify = $request->post('book_classify', '');
        $bookPosition = $request->post('book_position', '');
        $bookBelong = $request->post('book_belong', '');
        $bookImage = $request->post('book_image', '');
        $bookPrice = $request->post('book_price', '');
        $bookSummary = $request->post('book_summary', '');
        $bookAuthor = $request->post('book_author', '');
        $bookExt = $request->post('book_ext', '');

        if (empty($bookName)
            || empty($bookClassify)
            || empty($bookPosition)
            || empty($bookBelong)
            || empty($bookImage)
            || empty($bookPrice)
            || empty($bookSummary)
            || empty($bookAuthor)
            || empty($bookExt)) {
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }

        $bookInfo->book_name = $bookName;
        $bookInfo->book_classify = $bookClassify;
        $bookInfo->book_position = $bookPosition;
        $bookInfo->book_belong = $bookBelong;
        $bookInfo->book_image = $bookImage;
        $bookInfo->book_price = $bookPrice;
        $bookInfo->book_summary = $bookSummary;
        $bookInfo->book_author = $bookAuthor;
        $bookInfo->book_ext = $bookExt;

        $bookInfo->update();
        $this->codeReturn(ErrCode::SUCESS_CODE);
    }

    public function actionAddbook()
    {
        $model = new BookForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $book = new Book();
            $book->book_name = $model->book_name;
            $book->book_classify = $model->book_classify;
            $book->book_position = $model->book_position;
            $book->book_belong = $model->book_belong;
            $book->book_image = $model->book_image;
            $book->book_price = $model->book_price;
            $book->book_summary = $model->book_summary;
            $book->book_author = $model->book_author;
            $book->book_ext = $model->book_ext;
            $book->book_status = 2;//待上架
            $book->save();

            return $this->render('addbook-confirm', ['model' => $model]);
        } else {
            return $this->render('addbook', ['model' => $model]);
        }
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