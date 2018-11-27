<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/24
 * Time: 17:40
 */

namespace app\controllers;

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

class BookController extends Controller
{
    public function actionDetail()
    {
        $request = Yii::$app->request;
        $id = $request->get('book_id', '');
        if (empty($id) || !is_numeric($id)) {
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $bookInfo  = (new Query()) -> from('tb_book')->having(['=','id',$id])->one();
        $this->codeReturn(ErrCode::SUCESS_CODE, '', $bookInfo);
    }

    public function actionSearch(){
        $request = Yii::$app->request;
        $bookClassify = $request->get('book_classify', 0);
        $borrowStatus = $request->get('borrow_status', 0);
        $pageIndex = $request->get('page_index', 1);
        $pageNum = $request->get('page_num', 5);
        $queryName = $request->get('query_name', '');
        $query = (new Query()) -> from('tb_book')->having(['=','is_delete',0]);
        if($bookClassify != 0){
            $query->andHaving( ['=','book_classify',$bookClassify]);
        }
        if($borrowStatus != 0){
            $query->andHaving(  ['=','borrow_status',$borrowStatus]);
        }
        if(!empty($queryName)){
            $query->andHaving(  ['like','book_name',[$queryName]]);
        }
        $res = $query->limit($pageNum)->offset(($pageIndex-1)*$pageNum)->all();
        $this->codeReturn(ErrCode::SUCESS_CODE, '', $res);

    }

    public function actionSuggesiton()
    {
        $request = Yii::$app->request;
        $queryName = $request->get('book_name_query', '');
        if (empty($queryName)) {
            $this->codeReturn(ErrCode::ERROR_PARAMS);
        }
        $queryRet = (new Query()) -> from('tb_book')->having(['=','is_delete',0])->andHaving(['like', 'book_name', [$queryName]])->limit(10)->all();
        $ret = array();
        $list = array();
        foreach ($queryRet as $tempItem) {
            $item = array();
            $item['book_id'] = $tempItem->id;
            $item['book_name'] = $tempItem->book_name;
            $list[] = $item;
        }
        $ret['list'] = $list;
        $this->codeReturn(ErrCode::SUCESS_CODE, '', $ret);
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