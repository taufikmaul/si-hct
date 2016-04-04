<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\UserM */

$this->title = 'Perubahan User ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Akun', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-m-update">
    <?= $this->render('_formUpdate', [
        'model' => $model,
    ]) ?>

</div>
