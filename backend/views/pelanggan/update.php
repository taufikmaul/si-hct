<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PelangganM */

$this->title = 'Update Pelanggan M: ' . $model->pelanggan_id;
$this->params['breadcrumbs'][] = ['label' => 'Pelanggan Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pelanggan_id, 'url' => ['view', 'id' => $model->pelanggan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pelanggan-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
