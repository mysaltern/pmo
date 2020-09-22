<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TimeTab;

/**
 * TimeTabSearch represents the model behind the search form about `app\models\TimeTab`.
 */
class TimeTabSearch extends TimeTab
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PerNo', 'CALCDATE', 'BEGINDATE', 'BEGINTIME', 'DDESC', 'ENDDATE', 'ENDTIME'], 'safe'],
            [['STATUS', 'DURATION', 'EXTRAWORKSHEETCODE', 'MAMURIATSHEETCODE', 'MAMURIATTYPE', 'MORKHASISHEETCODE', 'MORKHASITYPE', 'PRESENCETYPE', 'SERVICELATESHEETCODE', 'SUSPENSIONSHEETCODE', 'WORKINGINTERVAL'], 'number'],
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
        $query = TimeTab::find();

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
            'STATUS' => $this->STATUS,
            'DURATION' => $this->DURATION,
            'EXTRAWORKSHEETCODE' => $this->EXTRAWORKSHEETCODE,
            'MAMURIATSHEETCODE' => $this->MAMURIATSHEETCODE,
            'MAMURIATTYPE' => $this->MAMURIATTYPE,
            'MORKHASISHEETCODE' => $this->MORKHASISHEETCODE,
            'MORKHASITYPE' => $this->MORKHASITYPE,
            'PRESENCETYPE' => $this->PRESENCETYPE,
            'SERVICELATESHEETCODE' => $this->SERVICELATESHEETCODE,
            'SUSPENSIONSHEETCODE' => $this->SUSPENSIONSHEETCODE,
            'WORKINGINTERVAL' => $this->WORKINGINTERVAL,
        ]);

        $query->andFilterWhere(['like', 'PerNo', $this->PerNo])
            ->andFilterWhere(['like', 'CALCDATE', $this->CALCDATE])
            ->andFilterWhere(['like', 'BEGINDATE', $this->BEGINDATE])
            ->andFilterWhere(['like', 'BEGINTIME', $this->BEGINTIME])
            ->andFilterWhere(['like', 'DDESC', $this->DDESC])
            ->andFilterWhere(['like', 'ENDDATE', $this->ENDDATE])
            ->andFilterWhere(['like', 'ENDTIME', $this->ENDTIME]);

        return $dataProvider;
    }
}
