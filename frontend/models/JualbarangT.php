<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jualbarang_t".
 *
 * @property integer $jualbarang_id
 * @property integer $pelanggan_id
 * @property integer $sudahbayar_id
 * @property string $tgl_jual
 * @property integer $total
 * @property integer $panjer
 * @property integer $diskon
 * @property integer $sisa
 * @property string $tgl_penagihan
 * @property string $cara_bayar
 * @property string $gambar
 * @property string $catatan
 *
 * @property PelangganM $pelanggan
 * @property SudahbayarR $sudahbayar
 * @property JualbarangdetT[] $jualbarangdetTs
 * @property SudahbayarR[] $sudahbayarRs
 */
class JualbarangT extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jualbarang_t';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelanggan_id', 'sudahbayar_id', 'tgl_jual', 'total', 'tgl_penagihan', 'cara_bayar'], 'required'],
            [['pelanggan_id', 'sudahbayar_id', 'total', 'panjer', 'diskon', 'sisa'], 'integer'],
            [['tgl_jual', 'tgl_penagihan'], 'safe'],
            [['cara_bayar', 'gambar', 'catatan'], 'string'],
            [['pelanggan_id'], 'exist', 'skipOnError' => true, 'targetClass' => PelangganM::className(), 'targetAttribute' => ['pelanggan_id' => 'pelanggan_id']],
            [['sudahbayar_id'], 'exist', 'skipOnError' => true, 'targetClass' => SudahbayarR::className(), 'targetAttribute' => ['sudahbayar_id' => 'sudahbayar_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'jualbarang_id' => 'ID Jual Barang ',
            'pelanggan_id' => 'ID Pelanggan ',
            'sudahbayar_id' => 'ID Sudah Bayar ',
            'tgl_jual' => 'Tanggal Jual',
            'total' => 'Total',
            'panjer' => 'Panjer',
            'diskon' => 'Diskon',
            'sisa' => 'Sisa',
            'tgl_penagihan' => 'Tanggal Penagihan',
            'cara_bayar' => 'Cara Bayar',
            'gambar' => 'Gambar',
            'catatan' => 'Catatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPelanggan()
    {
        return $this->hasOne(PelangganM::className(), ['pelanggan_id' => 'pelanggan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSudahbayar()
    {
        return $this->hasOne(SudahbayarR::className(), ['sudahbayar_id' => 'sudahbayar_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJualbarangdetTs()
    {
        return $this->hasMany(JualbarangdetT::className(), ['jualbarang_id' => 'jualbarang_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSudahbayarRs()
    {
        return $this->hasMany(SudahbayarR::className(), ['jualbarang_id' => 'jualbarang_id']);
    }
}
