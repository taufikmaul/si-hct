<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BarangM */

$this->title = $model->barang_id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-m-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->barang_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->barang_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'barang_id',
            'jenisbrg_id',
            'satuanbrg_id',
            'barang_kode',
            'barang_nama',
            'jml',
            'gambar:ntext',
        ],
    ]) ?>

</div>
