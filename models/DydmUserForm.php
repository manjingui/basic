<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/11/20
 * Time: 10:02
 */
use Yii;
use yii\base\Model;

class DydmUserForm extends Model
{

    public $phone;
    public $phone_code;

    public function rules()
    {
        return [

            [
                [
                    'phone',
                    'phone_code',
                ],
                'required'
            ],
        ];
    }

}