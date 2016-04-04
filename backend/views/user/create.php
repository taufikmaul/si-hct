<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\UserM */

$this->title = 'Create User M';
$this->params['breadcrumbs'][] = ['label' => 'User Ms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-m-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
