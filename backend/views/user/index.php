<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserMSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Ms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-m-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User M', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'user_id',
            'nama_user',
            'email:email',
            'username',
            'password',
            // 'authkey',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
