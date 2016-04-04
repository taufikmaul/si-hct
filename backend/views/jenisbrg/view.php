<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JenisbrgM */

$this->title = $model->jenisbrg_id;
$this->params['breadcrumbs'][] = ['label' => 'Jenisbrg Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenisbrg-m-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->jenisbrg_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->jenisbrg_id], [
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
            'jenisbrg_id',
            'jenisbrg_nama',
        ],
    ]) ?>

</div>
