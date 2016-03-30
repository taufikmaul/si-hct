<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sudahbayar_r".
 *
 * @property integer $sudahbayar_id
 * @property integer $jualbarang_id
 * @property integer $tandabayar_id
 * @property string $tgl_bayar
 * @property string $tgl_penagihan
 * @property integer $total
 * @property string $keterangan
 *
 * @property JualbarangT[] $jualbarangTs
 * @property JualbarangT $jualbarang
 * @property TandabayarR $tandabayar
 * @property TandabayarR[] $tandabayarRs
 */
class SudahbayarR extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sudahbayar_r';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jualbarang_id', 'tandabayar_id', 'tgl_bayar', 'tgl_penagihan', 'total'], 'required'],
            [['jualbarang_id', 'tandabayar_id', 'total'], 'integer'],
            [['tgl_bayar', 'tgl_penagihan'], 'safe'],
            [['keterangan'], 'string'],
            [['jualbarang_id'], 'exist', 'skipOnError' => true, 'targetClass' => JualbarangT::className(), 'targetAttribute' => ['jualbarang_id' => 'jualbarang_id']],
            [['tandabayar_id'], 'exist', 'skipOnError' => true, 'targetClass' => TandabayarR::className(), 'targetAttribute' => ['tandabayar_id' => 'tandabayar_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sudahbayar_id' => 'ID Sudah Bayar ',
            'jualbarang_id' => 'ID Jual Barang ',
            'tandabayar_id' => 'ID Tanda Bayar ',
            'tgl_bayar' => 'Tanggal Bayar',
            'tgl_penagihan' => 'Tanggal Penagihan',
            'total' => 'Total',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarangTs()
    {
        return $this->hasMany(JualbarangT::className(), ['sudahbayar_id' => 'sudahbayar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarang()
    {
        return $this->hasOne(JualbarangT::className(), ['jualbarang_id' => 'jualbarang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTandabayar()
    {
        return $this->hasOne(TandabayarR::className(), ['tandabayar_id' => 'tandabayar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTandabayarRs()
    {
        return $this->hasMany(TandabayarR::className(), ['sudahbayar_id' => 'sudahbayar_id']);
    }
}
