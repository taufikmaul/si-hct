<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\models\PelangganM;

$this->title = 'Transaksi Order Barang';
$this->params['breadcrumbs'][] = $this->title;

//Data
$dataPelanggan = PelangganM::find()->select(['pelanggan_nama as value','pelanggan_nama as label','pelanggan_id as id'])->asArray()->all();

?>

<script>
    jQuery('#jualbarangt-pelanggan_nama').autocomplete({"source":"","autoFill":true,"select":funtion(event,ui){
        $('#jualbarangt-pelanggan_id').val(ui.item.id);
    }
    })
</script>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1><i class="fa fa-exchange"></i> Tambah Transaksi</h1><br>
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6">
                    <?php //echo $form->field($model,'pelanggan_id')->dropDownList($listPelanggan,['prompt'=>'- Pilih Pelanggan -','class'=>'form-control']); ?><!-- -->
                    <div class="form-group field-jualbarangt-pelanggan_id required">
                        <label for="jualbarangt-pelanggan_id" class="control-label">Nama Client</label>
                        <?= AutoComplete::widget([
                                'model'=>$model,
                                'attribute'=>'pelanggan_nama',
                                'options'=>['class'=>'form-control'],
                                'clientOptions'=>[
                                    'source'=>$dataPelanggan,
                                    'autoFill'=>true,
                                    'select'=>new JsExpression("funtion(event,ui){
                                        $('#jualbarangt-pelanggan_id').val(ui.item.id);
                                    }")],
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
