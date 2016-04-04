<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SatuanbrgM */

$this->title = 'Update Satuanbrg M: ' . $model->satuanbrg_id;
$this->params['breadcrumbs'][] = ['label' => 'Satuanbrg Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->satuanbrg_id, 'url' => ['view', 'id' => $model->satuanbrg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="satuanbrg-m-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
