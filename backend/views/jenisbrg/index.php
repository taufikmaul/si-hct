<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\JenisbrgMSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenisbrg Ms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenisbrg-m-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jenisbrg M', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jenisbrg_id',
            'jenisbrg_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
