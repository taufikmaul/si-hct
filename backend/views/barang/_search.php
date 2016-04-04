<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BarangMSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="barang-m-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'barang_id') ?>

    <?= $form->field($model, 'jenisbrg_id') ?>

    <?= $form->field($model, 'satuanbrg_id') ?>

    <?= $form->field($model, 'barang_kode') ?>

    <?= $form->field($model, 'barang_nama') ?>

    <?php // echo $form->field($model, 'jml') ?>

    <?php // echo $form->field($model, 'gambar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
