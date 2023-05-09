<?php

namespace frontend\models;

use backend\models\Horse;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RiderSearch represents the model behind the search form of `backend\models\Rider`.
 */
class HorseSearch extends Horse
{
    public $str_search;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['str_search'], 'string'],
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


        $query->andWhere(['or', 
            ['like', 'horse_name', $this->str_search],
            ['horse_code' => $this->str_search],
            ['eam_id' => $this->str_search],
        ]);

        return $dataProvider;
    }
}
