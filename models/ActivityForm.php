<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/24
 * Time: 14:19
 */


namespace app\models;

use Yii;
use yii\base\Model;


class ActivityForm extends Model
{

    public $activity_type;
    public $activity_place;
    public $activity_time;
    public $activity_founder;
    public $activity_phone;
    public $activity_summary;

    public function rules()
    {
        return [

            [
                [
                    'activity_type',
                    'activity_place',
                    'activity_time',
                    'activity_founder',
                    'activity_phone',
                    'activity_summary',
                ],
                'required'
            ],
        ];
    }

}