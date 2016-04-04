<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BahanM */

$this->title = 'Create Bahan M';
$this->params['breadcrumbs'][] = ['label' => 'Bahan Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bahan-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
