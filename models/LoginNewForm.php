<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginNewForm extends Model
{
    public $phone;
    public $code;


    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [

            [['phone', 'code'], 'required'],


        ];
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }



    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(),   3600*24*30 );
        }
        return false;
    }


    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->phone);
        }

        return $this->_user;
    }
}
