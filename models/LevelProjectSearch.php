<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LevelProject;

/**
 * LevelProjectSearch represents the model behind the search form about `app\models\LevelProject`.
 */
class LevelProjectSearch extends LevelProject
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'projectID', 'parentID'], 'integer'],
            [['name', 'level'], 'safe'],
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
        $query = LevelProject::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'projectID' => $this->projectID,
            'parentID' => $this->parentID,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'level', $this->level]);

        return $dataProvider;
    }
}
