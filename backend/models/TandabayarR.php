<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tandabayar_r".
 *
 * @property integer $tandabayar_id
 * @property integer $sudahbayar_id
 * @property integer $total
 * @property string $diterima_dari
 * @property string $untuk
 *
 * @property SudahbayarR[] $sudahbayarRs
 * @property SudahbayarR $sudahbayar
 */
class TandabayarR extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tandabayar_r';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sudahbayar_id', 'total', 'diterima_dari'], 'required'],
            [['sudahbayar_id', 'total'], 'integer'],
            [['diterima_dari', 'untuk'], 'string'],
            [['sudahbayar_id'], 'exist', 'skipOnError' => true, 'targetClass' => SudahbayarR::className(), 'targetAttribute' => ['sudahbayar_id' => 'sudahbayar_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tandabayar_id' => 'ID Tanda Bayar ',
            'sudahbayar_id' => 'ID Sudah Bayar ',
            'total' => 'Total',
            'diterima_dari' => 'Diterima Dari',
            'untuk' => 'Untuk',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSudahbayarRs()
    {
        return $this->hasMany(SudahbayarR::className(), ['tandabayar_id' => 'tandabayar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSudahbayar()
    {
        return $this->hasOne(SudahbayarR::className(), ['sudahbayar_id' => 'sudahbayar_id']);
    }
}
