<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PagesLang;

/**
 * PagesLangSearch represents the model behind the search form of `common\models\PagesLang`.
 */
class PagesLangSearch extends PagesLang
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'item_id', 'lang_id'], 'integer'],
            [['lang', 'title_1', 'text_1', 'title_2', 'text_2', 'title_3', 'text_3', 'title_4', 'text_4', 'title_5', 'text_5', 'title_6', 'text_6', 'title_7', 'text_7'], 'safe'],
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
        $query = PagesLang::find();

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
            'item_id' => $this->item_id,
            'lang_id' => $this->lang_id,
        ]);

        $query->andFilterWhere(['like', 'lang', $this->lang])
            ->andFilterWhere(['like', 'title_1', $this->title_1])
            ->andFilterWhere(['like', 'text_1', $this->text_1])
            ->andFilterWhere(['like', 'title_2', $this->title_2])
            ->andFilterWhere(['like', 'text_2', $this->text_2])
            ->andFilterWhere(['like', 'title_3', $this->title_3])
            ->andFilterWhere(['like', 'text_3', $this->text_3])
            ->andFilterWhere(['like', 'title_4', $this->title_4])
            ->andFilterWhere(['like', 'text_4', $this->text_4])
            ->andFilterWhere(['like', 'title_5', $this->title_5])
            ->andFilterWhere(['like', 'text_5', $this->text_5])
            ->andFilterWhere(['like', 'title_6', $this->title_6])
            ->andFilterWhere(['like', 'text_6', $this->text_6])
            ->andFilterWhere(['like', 'title_7', $this->title_7])
            ->andFilterWhere(['like', 'text_7', $this->text_7]);

        return $dataProvider;
    }
}
