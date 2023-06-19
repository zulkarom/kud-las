<?php

namespace frontend\models;

use backend\models\Participant;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rider;

/**
 * RiderSearch represents the model behind the search form of `backend\models\Rider`.
 */
class EcertSearch extends Competition
{
    public $rider_name;
    public $horse_name;
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
        $query = Participant::find()
        ->joinWith(['rider r', 'horse h'])
        ->where(['register_status' => 100]);

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
    /*     $query->andFilterWhere([
            'id' => $this->id,
            'horse_dob' => $this->horse_dob,
            'hadlaju' => $this->hadlaju,
            'jarak' => $this->jarak,
            'cert_achive' => $this->cert_achive,
            'status' => $this->status,
        ]); */

        $query->andFilterWhere(['like', 'r.rider_name', $this->rider_name])
            ->andFilterWhere(['like', 'h.horse_name', $this->horse_name]); 

        return $dataProvider;
    }
}
