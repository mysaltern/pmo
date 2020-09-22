<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DayWork;

/**
 * DayWorkSearch represents the model behind the search form about `app\models\DayWork`.
 */
class DayWorkSearch extends DayWork {

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['PERNO', 'BeginStr', 'EndStr', 'FirstBeginDate', 'FirstBeginTime', 'LastEndDate', 'LastEndTime', 'Section'], 'safe'],
            [['DAILYABSENCE', 'DAILYMAMURIAT', 'DAILYMORKHASI', 'EARLYPERMFIRST', 'EARLYPERMLAST', 'EW_HOLINOTPERM', 'EW_HOLIPERM', 'EW_INMISSION', 'EW_NORMNOTPERM', 'EW_NORMPERM', 'EW_SPECIAL', 'EXTRAWORKTOTAL', 'HOLIDAY', 'KASRMOR', 'LATEPERMFIRST', 'LATEPERMLAST', 'LEAVEOFABSNOPAY', 'LEAVEOFABSPAY', 'MISSION', 'NIGHTWORK', 'NONWORKTOTAL', 'NW_ABSENT', 'NW_EARLY_FIRST', 'NW_EARLY_LAST', 'NW_LATE_FIRST', 'NW_LATE_LAST', 'NW_LEAVENOTPERM', 'NW_SPECIAL', 'ORDMOR', 'PRESENCEINDMAM', 'PRESENCEINDMOR', 'SERVICELATE', 'SUSPENDED', 'WORKTOTAL', 'WWORK', 'SERVICEPRICE', 'MEALPRICE', 'EDITED', 'WorkGroup', 'ReduceHoliday', 'HolidaysCounted', 'CalWork', 'EW_HoliInMission', 'EW_NormInMission', 'EW_BreakNotPerm', 'EW_BreakPerm', 'PPercent', 'CalCode'], 'number'],
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
        $query = DayWork::find()->select([ 'PERNO', 'sum(EXTRAWORKTOTAL) as ezafekari', 'sum(WORKTOTAL)  - sum(WWORK) as kasri', 'sum(NONWORKTOTAL) as kasriFaeild'])->groupBy(['PERNO']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0 = 1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'DAILYABSENCE' => $this->DAILYABSENCE,
            'DAILYMAMURIAT' => $this->DAILYMAMURIAT,
            'DAILYMORKHASI' => $this->DAILYMORKHASI,
            'EARLYPERMFIRST' => $this->EARLYPERMFIRST,
            'EARLYPERMLAST' => $this->EARLYPERMLAST,
            'EW_HOLINOTPERM' => $this->EW_HOLINOTPERM,
            'EW_HOLIPERM' => $this->EW_HOLIPERM,
            'EW_INMISSION' => $this->EW_INMISSION,
            'EW_NORMNOTPERM' => $this->EW_NORMNOTPERM,
            'EW_NORMPERM' => $this->EW_NORMPERM,
            'EW_SPECIAL' => $this->EW_SPECIAL,
            'EXTRAWORKTOTAL' => $this->EXTRAWORKTOTAL,
            'HOLIDAY' => $this->HOLIDAY,
            'KASRMOR' => $this->KASRMOR,
            'LATEPERMFIRST' => $this->LATEPERMFIRST,
            'LATEPERMLAST' => $this->LATEPERMLAST,
            'LEAVEOFABSNOPAY' => $this->LEAVEOFABSNOPAY,
            'LEAVEOFABSPAY' => $this->LEAVEOFABSPAY,
            'MISSION' => $this->MISSION,
            'NIGHTWORK' => $this->NIGHTWORK,
            'NONWORKTOTAL' => $this->NONWORKTOTAL,
            'NW_ABSENT' => $this->NW_ABSENT,
            'NW_EARLY_FIRST' => $this->NW_EARLY_FIRST,
            'NW_EARLY_LAST' => $this->NW_EARLY_LAST,
            'NW_LATE_FIRST' => $this->NW_LATE_FIRST,
            'NW_LATE_LAST' => $this->NW_LATE_LAST,
            'NW_LEAVENOTPERM' => $this->NW_LEAVENOTPERM,
            'NW_SPECIAL' => $this->NW_SPECIAL,
            'ORDMOR' => $this->ORDMOR,
            'PRESENCEINDMAM' => $this->PRESENCEINDMAM,
            'PRESENCEINDMOR' => $this->PRESENCEINDMOR,
            'SERVICELATE' => $this->SERVICELATE,
            'SUSPENDED' => $this->SUSPENDED,
            'WORKTOTAL' => $this->WORKTOTAL,
            'WWORK' => $this->WWORK,
            'SERVICEPRICE' => $this->SERVICEPRICE,
            'MEALPRICE' => $this->MEALPRICE,
            'EDITED' => $this->EDITED,
            'WorkGroup' => $this->WorkGroup,
            'ReduceHoliday' => $this->ReduceHoliday,
            'HolidaysCounted' => $this->HolidaysCounted,
            'CalWork' => $this->CalWork,
            'EW_HoliInMission' => $this->EW_HoliInMission,
            'EW_NormInMission' => $this->EW_NormInMission,
            'EW_BreakNotPerm' => $this->EW_BreakNotPerm,
            'EW_BreakPerm' => $this->EW_BreakPerm,
            'PPercent' => $this->PPercent,
            'CalCode' => $this->CalCode,
        ]);

        $query->andFilterWhere(['like', 'PERNO', $this->PERNO])
//                ->andFilterWhere(['like', 'DDATE', $this->DDATE])
                ->andFilterWhere(['like', 'BeginStr', $this->BeginStr])
                ->andFilterWhere(['like', 'EndStr', $this->EndStr])
                ->andFilterWhere(['like', 'FirstBeginDate', $this->FirstBeginDate])
                ->andFilterWhere(['like', 'FirstBeginTime', $this->FirstBeginTime])
                ->andFilterWhere(['like', 'LastEndDate', $this->LastEndDate])
                ->andFilterWhere(['like', 'LastEndTime', $this->LastEndTime])
                ->andFilterWhere(['like', 'Section', $this->Section]);

        return $dataProvider;
    }

}
