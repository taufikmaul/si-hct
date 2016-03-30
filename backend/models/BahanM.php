<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "bahan_m".
 *
 * @property integer $bahan_id
 * @property string $bahan_nama
 * @property string $keterangan
 *
 * @property JualbarangdetT[] $jualbarangdetTs
 */
class BahanM extends \yii\db\ActiveRecord
{
    /**a
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bahan_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bahan_nama'], 'required'],
            [['bahan_nama', 'keterangan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bahan_id' => 'ID Bahan',
            'bahan_nama' => 'Nama Bahan',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarangdetTs()
    {
        return $this->hasMany(JualbarangdetT::className(), ['bahan_id' => 'bahan_id']);
    }
}
