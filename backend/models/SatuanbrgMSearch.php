<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\SatuanbrgM;

/**
 * SatuanbrgMSearch represents the model behind the search form about `app\models\SatuanbrgM`.
 */
class SatuanbrgMSearch extends SatuanbrgM
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['satuanbrg_id'], 'integer'],
            [['satuanbrg_nama'], 'safe'],
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
        $query = SatuanbrgM::find();

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
            'satuanbrg_id' => $this->satuanbrg_id,
        ]);

        $query->andFilterWhere(['like', 'satuanbrg_nama', $this->satuanbrg_nama]);

        return $dataProvider;
    }
}
