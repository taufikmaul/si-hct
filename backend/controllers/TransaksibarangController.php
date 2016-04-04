<?php

namespace backend\controllers;

use Yii;
use yii\helpers\ArrayHelper;
use backend\models\SatuanbrgM;
use backend\models\BarangM;
use backend\models\JualbarangT;
use backend\models\JualbarangdetT;
use backend\models\PelangganM;
use backend\models\TandabayarR;
use backend\models\JenisbrgM;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

class TransaksibarangController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $modBarang = new BarangM();
        $model = new JualbarangT();
        $modJualBrngDet = new JualbarangdetT();

        return $this->render('index',[
            'modBarang'=>$modBarang,
            'model'=>$model,
            'modJualBrngDet'=>$modJualBrngDet
        ]);
    }
}

?>