<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\models\PelangganM;
use kartik\select2\Select2;
use kartik\typeahead\TypeaheadBasic;
use yii\helpers\ArrayHelper;

$this->title = 'Transaksi Order Barang';
$this->params['breadcrumbs'][] = $this->title;

//Data & Default Data
$dataPelanggan = array_merge(ArrayHelper::map(PelangganM::find()->all(), 'pelanggan_id', 'pelanggan_nama' ));
$model->tgl_jual = date('d M Y');
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-exchange"></i> Tambah Transaksi</h1><br>
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6">
                    <?php //echo $form->field($model,'pelanggan_id')->dropDownList($listPelanggan,['prompt'=>'- Pilih Pelanggan -','class'=>'form-control']); ?><!-- -->
                    <div class="form-group field-jualbarangt-pelanggan_id required">
<!--                        <label for="jualbarangt-pelanggan_id" class="control-label">Nama Client</label>-->
                        <?= $form->field($model, 'pelanggan_id')->widget(Select2::classname(), [
                            'data' => $dataPelanggan,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Select a state ...'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
                        <?= Html::activeHiddenInput($model, 'pelanggan_id')?>
                    </div>
                    <div class="form-group field-jualbarangt-tgl_jual required">
                        <label for="jualbarangt-tgl_jual" class="control-label">Tanggal Jual</label>
                        <?= DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'tgl_jual',
                            'language' => 'en',
                            'dateFormat' => 'php:d M Y',
                            'options'=>['class'=>'form-control'],
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model,'cara_bayar')->dropDownList(['angsur'=>'Angsur','cash'=>'Cash','nanti'=>'Nanti'],['prompt'=>'- Pilih Cara Bayar- ']); ?>
                    <div class="form-group field-jualbarangt-tgl_penagihan">
                        <label for="jualbarangt-tgl_penagihan" class="control-label">Tanggal Penagihan</label>
                        <?= DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'tgl_penagihan',
                            'language' => 'en',
                            'dateFormat' => 'php:d M Y',
                            'options'=>['class'=>'form-control']
                        ]); ?>
                    </div>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
