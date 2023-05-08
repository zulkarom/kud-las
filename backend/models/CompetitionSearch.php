<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Competition;

/**
 * CompetitionSearch represents the model behind the search form of `backend\models\Competition`.
 */
class CompetitionSearch extends Competition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kejohanan_id', 'category_id', 'rider_id', 'horse_id', 'cert_achive', 'status', 'register_status'], 'integer'],
            [['hadlaju', 'jarak'], 'number'],
            [['register_at'], 'safe'],
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
        $query = Competition::find();

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
            'kejohanan_id' => $this->kejohanan_id,
            'category_id' => $this->category_id,
            'rider_id' => $this->rider_id,
            'horse_id' => $this->horse_id,
            'hadlaju' => $this->hadlaju,
            'jarak' => $this->jarak,
            'cert_achive' => $this->cert_achive,
            'status' => $this->status,
            'register_at' => $this->register_at,
            'register_status' => $this->register_status,
        ]);

        return $dataProvider;
    }
}
