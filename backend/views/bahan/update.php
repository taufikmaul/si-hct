<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BahanM */

$this->title = 'Update Bahan M: ' . $model->bahan_id;
$this->params['breadcrumbs'][] = ['label' => 'Bahan Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bahan_id, 'url' => ['view', 'id' => $model->bahan_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bahan-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
