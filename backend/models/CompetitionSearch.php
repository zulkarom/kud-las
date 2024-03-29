<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Participant;

/**
 * CompetitionSearch represents the model behind the search form of `backend\models\Participant`.
 */
class CompetitionSearch extends Participant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','kejohanan_id', 'category_id', 'rider_id', 'horse_id', 'register_status', 'deposit_paid'], 'integer'],
            [['hadlaju', 'jarak'], 'number'],
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
        $query = Participant::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 100,
            ],
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
            'register_status' => $this->register_status,
            'category_id' => $this->category_id,
            'deposit_paid' => $this->deposit_paid
        ]);

        return $dataProvider;
    }
}
