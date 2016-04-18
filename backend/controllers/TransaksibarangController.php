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
            $totalPenjualan = 0;
            $connection = \Yii::$app->db;
            $transaction = $connection->beginTransaction();
            try {
                $model->load(Yii::$app->request->post());
                $model->tgl_jual = Yii::$app->formatter->asDate($model->tgl_jual,'php:Y-m-d');
                if(!empty($model->tgl_ambil))
                    $model->tgl_ambil = Yii::$app->formatter->asDate($model->tgl_ambil,'php:Y-m-d');
                if(!empty($model->tgl_penagihan))
                    $model->tgl_penagihan = Yii::$app->formatter->asDate($model->tgl_penagihan,'php:Y-m-d');
                if (isset(Yii::$app->request->post()['JualbarangdetT'])) {
                    foreach (Yii::$app->request->post()['JualbarangdetT'] AS $i => $data) {
                        $totalPenjualan += $data['jumlah'];
                    }
                }
                $model->total = $totalPenjualan;
                if(empty($model->panjer))
                    $model->panjer = 0;
                if(empty($model->diskon))
                    $model->diskon = 0;
                if(empty($model->sisa))
                    $model->sisa = 0;
                if(empty($model->tgl_penagihan))
                    $model->tgl_penagihan = date('Y-m-d',strtotime('+7 days'));
                if($model->validate()){
                    $model->save();
                    foreach (Yii::$app->request->post()['JualbarangdetT'] AS $i => $data) {
                        $modJualBrngDet = new JualbarangdetT();
                        $modJualBrngDet->attributes = $data;
                        $modJualBrngDet->jualbarang_id = $model->jualbarang_id;
                        if($modJualBrngDet->validate())
                            $modJualBrngDet->save();
                    }
                    $transaction->commit();
                    Yii::$app->getSession()->setFlash('success', 'Sukses Menambahkan Transaksi !');
                    return $this->redirect(['index', 'id' => $model->jualbarang_id]);
                }
            }catch(\Exception $e) {
                $transaction->rollBack();
                throw $e;
            }
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