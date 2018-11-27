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

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class BookForm extends Model
{

    public $book_name;
    public $book_classify;
    public $book_position;
    public $book_belong;
    public $book_image;
    public $book_price;
    public $book_summary;
    public $book_author;
    public $book_ext;

    public function rules()
    {
        return [

            [
                [
                    'book_name',
                    'book_classify',
                    'book_position',
                    'book_belong',
                    'book_image',
                    'book_price',
                    'book_summary',
                    'book_author',
                    'book_ext'
                ],
                'required'
            ],
        ];
    }

}