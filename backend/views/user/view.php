<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserM */

$this->title = $model->nama_user;
$this->params['breadcrumbs'][] = ['label' => 'User', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-m-view">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <p>
        <?= Html::a('<i class="fa fa-wrench"></i> Update', ['update', 'id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <!-- <?= Html::a('Delete', ['delete', 'id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?> -->
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'user_id',
            'nama_user',
            'email:email',
            'username',
            [
              'attribute'=>'password',
              'format'=>'raw',
              'value'=>'*******',
            ],
            // 'authkey',
            [
              'attribute'=>'last_login',
              'format'=>'raw',
              'value'=>$model->FLastLogin,
            ],
        ],
    ]) ?>

</div>
