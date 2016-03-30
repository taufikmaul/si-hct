<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SatuanbrgM */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="satuanbrg-m-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'satuanbrg_nama')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
