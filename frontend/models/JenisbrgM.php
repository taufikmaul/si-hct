<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenisbrg_m".
 *
 * @property integer $jenisbrg_id
 * @property string $jenisbrg_nama
 *
 * @property BarangM[] $barangMs
 */
class JenisbrgM extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenisbrg_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenisbrg_nama'], 'required'],
            [['jenisbrg_nama'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jenisbrg_id' => 'ID Jenis Barang ',
            'jenisbrg_nama' => 'Nama Jenis Barang ',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMs()
    {
        return $this->hasMany(BarangM::className(), ['jenisbrg_id' => 'jenisbrg_id']);
    }
}
