<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PelangganM */

$this->title = 'Create Pelanggan M';
$this->params['breadcrumbs'][] = ['label' => 'Pelanggan Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pelanggan-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
