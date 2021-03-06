<?php

namespace app\modules\dormitory\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\dormitory\models\Announcements;

/**
 * AnnouncementsSearch represents the model behind the search form about `app\modules\dormitory\models\Announcements`.
 */
class AnnouncementsSearch extends Announcements
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['start_date', 'tittle', 'body', 'end_date', 'status'], 'safe'],
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
        $query = Announcements::find();

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
        ]);

        $query->andFilterWhere(['like', 'start_date', $this->start_date])
            ->andFilterWhere(['like', 'tittle', $this->tittle])
            ->andFilterWhere(['like', 'body', $this->body])
            ->andFilterWhere(['like', 'end_date', $this->end_date])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
