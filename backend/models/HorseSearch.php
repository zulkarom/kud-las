<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Horse;

/**
 * HorseSearch represents the model behind the search form of `backend\models\Horse`.
 */
class HorseSearch extends Horse
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['eam_id', 'horse_code', 'horse_name', 'horse_dob', 'horse_color', 'horse_gender', 'country_born'], 'safe'],
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
        $query = Horse::find();

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
        ]);

        $query->andFilterWhere(['like', 'eam_id', $this->eam_id])
            ->andFilterWhere(['like', 'horse_code', $this->horse_code])
            ->andFilterWhere(['like', 'horse_name', $this->horse_name])
            ->andFilterWhere(['like', 'horse_color', $this->horse_color])
            ->andFilterWhere(['like', 'horse_gender', $this->horse_gender])
            ->andFilterWhere(['like', 'country_born', $this->country_born]);

        return $dataProvider;
    }
}
