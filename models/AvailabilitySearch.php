<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Availability;

/**
 * AvailabilitySearch represents the model behind the search form about `app\models\Availability`.
 */
class AvailabilitySearch extends Availability
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_workID', 'levelID', 'projectID', 'type', 'profileID'], 'integer'],
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
        $query = Availability::find();

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
            'category_workID' => $this->category_workID,
            'levelID' => $this->levelID,
            'projectID' => $this->projectID,
            'type' => $this->type,
            'profileID' => $this->profileID,
        ]);

        return $dataProvider;
    }
}
