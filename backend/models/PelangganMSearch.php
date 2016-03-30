<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\PelangganM;

/**
 * PelangganMSearch represents the model behind the search form about `app\models\PelangganM`.
 */
class PelangganMSearch extends PelangganM
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelanggan_id'], 'integer'],
            [['pelanggan_nama', 'alamat', 'no_tlp', 'email'], 'safe'],
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
        $query = PelangganM::find();

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
            'pelanggan_id' => $this->pelanggan_id,
        ]);

        $query->andFilterWhere(['like', 'pelanggan_nama', $this->pelanggan_nama])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'no_tlp', $this->no_tlp])
            ->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
