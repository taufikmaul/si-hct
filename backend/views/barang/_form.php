<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BarangM */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-m-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenisbrg_id')->textInput() ?>

    <?= $form->field($model, 'satuanbrg_id')->textInput() ?>

    <?= $form->field($model, 'barang_kode')->textInput() ?>

    <?= $form->field($model, 'barang_nama')->textInput() ?>

    <?= $form->field($model, 'jml')->textInput() ?>

    <?= $form->field($model, 'gambar')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
