<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SatuanbrgMSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Satuanbrg Ms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuanbrg-m-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Satuanbrg M', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'satuanbrg_id',
            'satuanbrg_nama',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
