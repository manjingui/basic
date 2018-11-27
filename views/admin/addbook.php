<?php
/**
 * Created by PhpStorm.
 * User: manjingui
 * Date: 2018/10/24
 * Time: 14:34
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'book_name') ?>

<?= $form->field($model, 'book_classify') ?>

<?= $form->field($model, 'book_position') ?>

<?= $form->field($model, 'book_belong') ?>

<?= $form->field($model, 'book_image') ?>

<?= $form->field($model, 'book_price') ?>

<?= $form->field($model, 'book_summary') ?>

<?= $form->field($model, 'book_author') ?>
<?= $form->field($model, 'book_ext') ?>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>