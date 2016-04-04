<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SatuanbrgM */

$this->title = $model->satuanbrg_id;
$this->params['breadcrumbs'][] = ['label' => 'Satuanbrg Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuanbrg-m-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->satuanbrg_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->satuanbrg_id], [
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
            'satuanbrg_id',
            'satuanbrg_nama',
        ],
    ]) ?>

</div>
