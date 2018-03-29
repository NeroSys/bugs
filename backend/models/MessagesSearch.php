<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Messages;

/**
 * MessagesSearch represents the model behind the search form of `common\models\Messages`.
 */
class MessagesSearch extends Messages
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'courses_id', 'phone', 'new', 'answered'], 'integer'],
            [['name', 'mail', 'message'], 'safe'],
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
        $query = Messages::find();

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
            'courses_id' => $this->courses_id,
            'phone' => $this->phone,
            'new' => $this->new,
            'answered' => $this->answered,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'mail', $this->mail])
            ->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
