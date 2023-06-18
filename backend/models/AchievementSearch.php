<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Competition;

/**
 * CompetitionSearch represents the model behind the search form of `backend\models\Competition`.
 */
class AchievementSearch extends Competition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'cert_achive'], 'integer'],

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
        $query = Competition::find()->joinWith(['vest v'])
        ->where(['register_status' => 100])
        ->orderBy('v.vest_no ASC');

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
            'kejohanan_id' => $this->kejohanan_id,
            'category_id' => $this->category_id,
            'cert_achive' => $this->cert_achive,
        ]);

        return $dataProvider;
    }
}
