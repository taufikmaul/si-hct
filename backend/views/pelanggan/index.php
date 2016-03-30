<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PelangganMSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pelanggan Ms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggan-m-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pelanggan M', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pelanggan_id',
            'pelanggan_nama',
            'alamat:ntext',
            'no_tlp',
            'email:email',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
