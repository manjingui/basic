<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/26
 * Time: 14:20
 */
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Borrow extends ActiveRecord
{

    public static function tableName()
    {
        return 'tb_borrow';
    }
}