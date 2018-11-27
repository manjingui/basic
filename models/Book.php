<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/24
 * Time: 15:10
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Book extends ActiveRecord
{

    public static function tableName()
    {
        return 'tb_book';
    }

    public static function tranModelToArray($bookInfo)
    {
        if(empty($bookInfo)){
            return array();
        }
        $ret = array();
        $ret['book_id'] = $bookInfo->id;
        $ret['book_name'] = $bookInfo->book_name;
        $ret['book_classify'] = $bookInfo->book_classify;
        $ret['book_position'] = $bookInfo->book_position;
        $ret['book_belong'] = $bookInfo->book_belong;
        $ret['book_image'] = $bookInfo->book_image;
        $ret['book_price'] = $bookInfo->book_price;
        $ret['book_summary'] = $bookInfo->book_summary;
        $ret['book_author'] = $bookInfo->book_author;
        $ret['book_ext'] = $bookInfo->book_ext;
        $ret['book_status'] = $bookInfo->book_status;
        $ret['borrow_status'] = $bookInfo->borrow_status;
        return $ret;
    }
}