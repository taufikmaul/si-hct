<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BarangMSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Barang Ms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-m-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Barang M', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'barang_id',
            'jenisbrg_id',
            'satuanbrg_id',
            'barang_kode',
            'barang_nama',
            // 'jml',
            // 'gambar:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
