<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use backend\models\PelangganM;
use backend\models\BarangM;
use kartik\select2\Select2;
use kartik\typeahead\TypeaheadBasic;
use yii\helpers\ArrayHelper;

$this->title = 'Transaksi Order Barang';
$this->params['breadcrumbs'][] = $this->title;

//Data & Default Data
$dataPelanggan = ArrayHelper::map(PelangganM::find()->all(), 'pelanggan_id', 'pelanggan_nama' );
$dataBarang = ArrayHelper::map(BarangM::find()->all(),'barang_id','barang_nama');
$model->tgl_jual = date('d M Y');
?>

<style>
    .panjer{
        display: none;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
<!--            <h1><i class="fa fa-exchange"></i> Tambah Transaksi</h1><br>-->
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-12">
                    <?php $model->kode_transaksi = $model->getKodeTransaksi(); ?>
                    <?= $form->field($model,'kode_transaksi')->textInput(['readonly'=>'readonly']) ?>
                </div>
                <div class="col-md-6">
                    <?php //echo $form->field($model,'pelanggan_id')->dropDownList($listPelanggan,['prompt'=>'- Pilih Pelanggan -','class'=>'form-control']); ?><!-- -->
                    <div class="form-group field-jualbarangt-pelanggan_id required">
<!--                        <label for="jualbarangt-pelanggan_id" class="control-label">Nama Client</label>-->
                        <?= $form->field($model, 'pelanggan_id')->widget(Select2::classname(), [
                            'data' => $dataPelanggan,
                            'language' => 'en',
                            'options' => ['placeholder' => 'Ketik Nama Pelanggan . . .'],
                            'pluginOptions' => [
                                'allowClear' => true
                            ],
                        ]);
                        ?>
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
                    <div class="form-group field-jualbarangt-tgl_ambil required">
                        <label for="jualbarangt-tgl_ambil" class="control-label">Tanggal Pengambilan</label>
                        <?= DatePicker::widget([
                            'model' => $model,
                            'attribute' => 'tgl_ambil',
                            'language' => 'en',
                            'dateFormat' => 'php:d M Y',
                            'options'=>['class'=>'form-control'],
                        ]); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model,'cara_bayar')->dropDownList(['angsur'=>'Angsur','cash'=>'Cash','nanti'=>'Nanti'],['prompt'=>'- Pilih Cara Bayar- ','onChange'=>'formPanjer(this);']); ?>
                    <div class="panjer">
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
                        <div class="row">
                            <div class="col-md-6">
                                <?= $form->field($model,'panjer'); ?>
                            </div>
                            <div class="col-md-6">
                                <?= $form->field($model,'sisa'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <fieldset>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group field-jualbarangt-barang">
                                    <?= $form->field($model, 'barang')->widget(Select2::classname(), [
                                        'data' => $dataBarang,
                                        'language' => 'en',
                                        'options' => ['placeholder' => 'Ketik Barang . . .'],
                                        'pluginOptions' => [
                                            'allowClear' => true
                                        ],
                                    ]);
                                    ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <?= Html::button('<i class="fa fa-plus"></i>',
                                    ['class'=>'btn btn-success','style'=>'margin-top:25px;','onClick'=>'tambahBarang(this);return false;']); ?>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="tabel-Data">
                        <thead>
                        <tr>
                            <td>No</td>
                            <td>Kode</td>
                            <td>Barang</td>
                            <td>Ukuran</td>
                            <td>Bahan</td>
                            <td>Harga Satuan</td>
                            <td>Jumlah</td>
                            <td>Total</td>
                            <td>Keterangan</td>
                            <td>Batal</td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    <?= Html::submitButton( '<i class="fa fa-plus"></i> Tambah', ['class' =>'btn btn-success','disabled'=>$model->isNewRecord ?FALSE:TRUE]) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<script>
    function formPanjer(obj) {
        var cara_bayar = $(obj).val();
        if(cara_bayar != 'cash'){
            $('.panjer').fadeIn('slow');
        }else{
            $('.panjer').fadeOut('slow');
        }
    }

    function tambahBarang(obj) {
        var barang_id = $(obj).parents('fieldset').find('#jualbarangt-barang');
        var urutan = document.getElementById('tabel-Data').getElementsByTagName("tbody")[0].getElementsByTagName("tr").length;;
        $.ajax({
            type:'POST',
            url:'<?= Yii::$app->urlManager->createUrl('transaksibarang/tambahbarang') ?>',
            data:{barang_id:barang_id.val(),urutan:urutan},
            dataType:'json',
            success:function (result) {
                barang_id.val('');
                $('#tabel-Data > tbody').append(result);
            }
        })
    }
</script>
