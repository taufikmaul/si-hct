<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jualbarangdet_t".
 *
 * @property integer $jualbarangdet_id
 * @property integer $barang_id
 * @property integer $bahan_id
 * @property integer $jualbarang_id
 * @property integer $qty_jual
 * @property integer $harga_satuan
 * @property integer $jumlah
 * @property string $ukuran
 * @property string $keterangan
 *
 * @property BahanM $bahan
 * @property BarangM $barang
 * @property JualbarangT $jualbarang
 */
class JualbarangdetT extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jualbarangdet_t';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barang_id', 'bahan_id', 'jualbarang_id', 'qty_jual'], 'required'],
            [['barang_id', 'bahan_id', 'jualbarang_id', 'qty_jual', 'harga_satuan', 'jumlah'], 'integer'],
            [['ukuran', 'keterangan'], 'string'],
            [['bahan_id'], 'exist', 'skipOnError' => true, 'targetClass' => BahanM::className(), 'targetAttribute' => ['bahan_id' => 'bahan_id']],
            [['barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => BarangM::className(), 'targetAttribute' => ['barang_id' => 'barang_id']],
            [['jualbarang_id'], 'exist', 'skipOnError' => true, 'targetClass' => JualbarangT::className(), 'targetAttribute' => ['jualbarang_id' => 'jualbarang_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jualbarangdet_id' => 'ID Jual Barang Detail',
            'barang_id' => 'ID Barang',
            'bahan_id' => 'ID Bahan ',
            'jualbarang_id' => 'ID Jual Barang',
            'qty_jual' => 'Jumlah Jual',
            'harga_satuan' => 'Harga Satuan',
            'jumlah' => 'Jumlah',
            'ukuran' => 'Ukuran',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBahan()
    {
        return $this->hasOne(BahanM::className(), ['bahan_id' => 'bahan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarang()
    {
        return $this->hasOne(BarangM::className(), ['barang_id' => 'barang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarang()
    {
        return $this->hasOne(JualbarangT::className(), ['jualbarang_id' => 'jualbarang_id']);
    }
}
