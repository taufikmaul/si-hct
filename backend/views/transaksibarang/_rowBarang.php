<?php
/**
 * Created by PhpStorm.
 * User: taufik
 * Date: 05/04/16
 * Time: 11:35
 */
use yii\helpers\Html;
use backend\models\BahanM;
use yii\helpers\ArrayHelper;

$dataBahan = ArrayHelper::map(BahanM::find()->all(), 'bahan_id', 'bahan_nama' );
?>
<tr>
    <td><?= $urutan+1; ?></td>
    <td><?= $model->barang_kode; ?>
        <?= Html::activeHiddenInput($modJualBarangDet,'['.$urutan.']barang_id'); ?></td>
    <td><?= $model->barang_nama; ?></td>
    <td><?= Html::activeTextInput($modJualBarangDet,'['.$urutan.']ukuran',['style'=>'width:100px;']); ?></td>
    <td><?= Html::activeDropDownList($modJualBarangDet,'['.$urutan.']bahan_id',$dataBahan,['prompt'=>'- Pilih Bahan - ']); ?></td>
    <td><?= Html::activeTextInput($modJualBarangDet,'['.$urutan.']harga_satuan',['style'=>'width:100px;','onChange'=>'hitungAll(this);']); ?></td>
    <td><?= Html::activeTextInput($modJualBarangDet,'['.$urutan.']qty_jual',['style'=>'width:30px;','onChange'=>'hitungAll(this);']); ?></td>
    <td><?= Html::activeTextInput($modJualBarangDet,'['.$urutan.']jumlah',['style'=>'width:100px;']); ?></td>
    <td><?= Html::activeTextarea($modJualBarangDet,'['.$urutan.']keterangan') ?></td>
    <td></td>
</tr>
