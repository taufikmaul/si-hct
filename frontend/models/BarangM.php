<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang_m".
 *
 * @property integer $barang_id
 * @property integer $jenisbrg_id
 * @property integer $satuanbrg_id
 * @property string $barang_kode
 * @property string $barang_nama
 * @property integer $jml
 * @property string $gambar
 *
 * @property JenisbrgM $jenisbrg
 * @property SatuanbrgM $satuanbrg
 * @property JualbarangdetT[] $jualbarangdetTs
 */
class BarangM extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'barang_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenisbrg_id', 'satuanbrg_id', 'barang_nama', 'jml'], 'required'],
            [['jenisbrg_id', 'satuanbrg_id', 'jml'], 'integer'],
            [['barang_kode', 'barang_nama', 'gambar'], 'string'],
            [['jenisbrg_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisbrgM::className(), 'targetAttribute' => ['jenisbrg_id' => 'jenisbrg_id']],
            [['satuanbrg_id'], 'exist', 'skipOnError' => true, 'targetClass' => SatuanbrgM::className(), 'targetAttribute' => ['satuanbrg_id' => 'satuanbrg_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'barang_id' => 'ID Barang ',
            'jenisbrg_id' => 'ID Jenis Barang ',
            'satuanbrg_id' => 'ID Satuan Barang ',
            'barang_kode' => 'Kode Barang ',
            'barang_nama' => 'Nama Barang ',
            'jml' => 'Jml',
            'gambar' => 'Gambar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJenisbrg()
    {
        return $this->hasOne(JenisbrgM::className(), ['jenisbrg_id' => 'jenisbrg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSatuanbrg()
    {
        return $this->hasOne(SatuanbrgM::className(), ['satuanbrg_id' => 'satuanbrg_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarangdetTs()
    {
        return $this->hasMany(JualbarangdetT::className(), ['barang_id' => 'barang_id']);
    }
}
