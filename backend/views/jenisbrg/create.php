<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JenisbrgM */

$this->title = 'Create Jenisbrg M';
$this->params['breadcrumbs'][] = ['label' => 'Jenisbrg Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenisbrg-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
