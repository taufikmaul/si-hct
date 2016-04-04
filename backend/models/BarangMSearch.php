<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BarangM;

/**
 * BarangMSearch represents the model behind the search form about `app\models\BarangM`.
 */
class BarangMSearch extends BarangM
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['barang_id', 'jenisbrg_id', 'satuanbrg_id', 'jml'], 'integer'],
            [['barang_kode', 'barang_nama', 'gambar'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = BarangM::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'barang_id' => $this->barang_id,
            'jenisbrg_id' => $this->jenisbrg_id,
            'satuanbrg_id' => $this->satuanbrg_id,
            'jml' => $this->jml,
        ]);

        $query->andFilterWhere(['like', 'barang_kode', $this->barang_kode])
            ->andFilterWhere(['like', 'barang_nama', $this->barang_nama])
            ->andFilterWhere(['like', 'gambar', $this->gambar]);

        return $dataProvider;
    }
}
