<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pelanggan_m".
 *
 * @property integer $pelanggan_id
 * @property string $pelanggan_nama
 * @property string $alamat
 * @property string $no_tlp
 * @property string $email
 *
 * @property JualbarangT[] $jualbarangTs
 */
class PelangganM extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pelanggan_m';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelanggan_nama'], 'required'],
            [['pelanggan_nama', 'alamat', 'no_tlp', 'email'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pelanggan_id' => 'ID Pelanggan ',
            'pelanggan_nama' => 'Nama Pelanggan',
            'alamat' => 'Alamat',
            'no_tlp' => 'No Telepon',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarangTs()
    {
        return $this->hasMany(JualbarangT::className(), ['pelanggan_id' => 'pelanggan_id']);
    }
}
