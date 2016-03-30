<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JenisbrgM */

$this->title = 'Update Jenisbrg M: ' . $model->jenisbrg_id;
$this->params['breadcrumbs'][] = ['label' => 'Jenisbrg Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jenisbrg_id, 'url' => ['view', 'id' => $model->jenisbrg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenisbrg-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
