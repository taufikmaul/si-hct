<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "satuanbrg_m".
 *
 * @property integer $satuanbrg_id
 * @property string $satuanbrg_nama
 *
 * @property BarangM[] $barangMs
 */
class SatuanbrgM extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'satuanbrg_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['satuanbrg_nama'], 'required'],
            [['satuanbrg_nama'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'satuanbrg_id' => 'ID Satuan Barang ',
            'satuanbrg_nama' => 'Satuan Nama Barang ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMs()
    {
        return $this->hasMany(BarangM::className(), ['satuanbrg_id' => 'satuanbrg_id']);
    }
}
