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
use yii\helpers\Json;
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
                        'actions' => ['logout', 'index','tambahbarang'],
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

        if(Yii::$app->request->post()) {
            echo "<pre>";
            print_r($_POST);
            exit;
            $model->load(Yii::$app->request->post());
        }



        return $this->render('index',[
            'modBarang'=>$modBarang,
            'model'=>$model,
            'modJualBrngDet'=>$modJualBrngDet
        ]);
    }

    public function actionTambahbarang()
    {
        if(Yii::$app->request->isAjax) {
            $modJualBarangDet = new JualbarangdetT();
            $barang_id = $_POST['barang_id'];
            $urutan = $_POST['urutan'];
            if (!empty($barang_id) && BarangM::findOne($barang_id) !== null) {
                $model= BarangM::findOne($barang_id);
                $modJualBarangDet->barang_id = $model->barang_id;
                $modJualBarangDet->qty_jual = 1;
                $rows = $this->renderPartial('_rowBarang', ['model' => $model,'modJualBarangDet'=>$modJualBarangDet, 'urutan' => $urutan]);
            } else {
                $rows = null;
            }
            echo Json::encode($rows);
            Yii::$app->end();
        }
    }
}

?>