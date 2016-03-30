<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BarangM */

$this->title = 'Create Barang M';
$this->params['breadcrumbs'][] = ['label' => 'Barang Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="barang-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
