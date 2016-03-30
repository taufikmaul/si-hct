<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BarangM */

$this->title = 'Update Barang M: ' . $model->barang_id;
$this->params['breadcrumbs'][] = ['label' => 'Barang Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->barang_id, 'url' => ['view', 'id' => $model->barang_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="barang-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
