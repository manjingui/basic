<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/25
 * Time: 10:17
 */

namespace app\models;

use Yii;

class ErrCode
{
    const SUCESS_CODE = 0;
    const ERROR_PARAMS = 1004;
    const ERROR_BOOK_NO_EXIST = 1002;
    const ERROR_NO_LIMIT = 1003;

    static $ERROR_INFO = array(
        self::ERROR_PARAMS => '参数错误',
        self::SUCESS_CODE => '',
    );

}