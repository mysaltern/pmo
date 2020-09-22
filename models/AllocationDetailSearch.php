<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AllocationDetail;

/**
 * AllocationDetailSearch represents the model behind the search form about `app\models\AllocationDetail`.
 */
class AllocationDetailSearch extends AllocationDetail {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['id', 'duration', 'allocationID', 'level_projectID', 'percent'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {

        $userID = Yii::$app->user->id;

        $profileID = Profile::find()->select('id')->where(['userID' => $userID])->asArray()->one();
        $query = AllocationDetail::find()->innerJoin('allocation', '`allocation`.`id` = `allocation_detail`.`allocationID`')->where(['profileID' => $profileID]);

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
            'duration' => $this->duration,
            'allocationID' => $this->allocationID,
            'level_projectID' => $this->level_projectID,
            'percent' => $this->percent,
        ]);

        return $dataProvider;
    }

}
