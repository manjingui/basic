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

class UserDB extends ActiveRecord
{

    public static function tableName()
    {
        return 'user';
    }

}