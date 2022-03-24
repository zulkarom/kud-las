<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rider;

/**
 * RiderSearch represents the model behind the search form of `backend\models\Rider`.
 */
class RiderSearch extends Rider
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['rider_name', 'horse_name'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Rider::find();

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
            'id' => $this->id,
            'horse_dob' => $this->horse_dob,
            'hadlaju' => $this->hadlaju,
            'jarak' => $this->jarak,
            'cert_achive' => $this->cert_achive,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'rider_name', $this->rider_name])
            ->andFilterWhere(['like', 'nric', $this->nric])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'horse_name', $this->horse_name])
            ->andFilterWhere(['like', 'horse_color', $this->horse_color])
            ->andFilterWhere(['like', 'horse_gender', $this->horse_gender])
            ->andFilterWhere(['like', 'country_born', $this->country_born])
            ->andFilterWhere(['like', 'kelab', $this->kelab]);

        return $dataProvider;
    }
}
