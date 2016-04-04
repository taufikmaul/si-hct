<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SatuanbrgM */

$this->title = 'Create Satuanbrg M';
$this->params['breadcrumbs'][] = ['label' => 'Satuanbrg Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="satuanbrg-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
