<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserM */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-m-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_user')->textInput() ?>

    <?= $form->field($model, 'email')->textInput() ?>

    <?= $form->field($model, 'username')->textInput() ?>

    <?= $form->field($model, 'password')->hiddenInput()->label(false) ?>

    <?= $form->field($model, 'password_baru')->passwordInput(array('placeholder'=>'Ketik Password Baru anda disini, jika tidak ganti abaikan')) ?>

    <?= $form->field($model, 'authkey')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
