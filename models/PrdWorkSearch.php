<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PrdWork;

/**
 * PrdWorkSearch represents the model behind the search form about `app\models\PrdWork`.
 */
class PrdWorkSearch extends PrdWork
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERNO', 'Section', 'LastEditUserCode', 'LastEditDate'], 'safe'],
            [['PERIOD', 'DAYSPRESENT', 'DAYSWORKED', 'EARLYPERMAMOUNT', 'EARLYPERMCOUNT', 'EW_HOLIPERM', 'EW_HOLINOTPERM', 'EW_INMISSION', 'EW_NORMPERM', 'EW_NORMNOTPERM', 'EW_SPECIAL', 'EXTRAWORKTOTAL', 'FORGIVEN_LATEAMOUNT', 'FORGIVEN_LATECOUNT', 'HG_MINUTES', 'HG_DAYS', 'HT_MINUTES', 'HT_DAYS', 'KASRMOR', 'LATEPERMAMOUNT', 'LATEPERMCOUNT', 'LEAVEOFABSALLOTED', 'LEAVEOFABSNOPAY', 'LEAVEOFABSPAY', 'MISSION', 'MORKHASILEFT', 'MORKHASIRATION', 'NIGHTWORK', 'NONWORKTOTAL', 'NW_ABSENT', 'NW_ABSENTCNT', 'NW_EARLY', 'NW_EARLYCNT', 'NW_LATE', 'NW_LATECNT', 'NW_LEAVENOTPERM', 'NW_LEAVENOTPERMCNT', 'NW_SPECIAL', 'ORDMOR', 'PAYINGDAYS', 'PRESENCEINDMAM', 'PRESENCEINDMOR', 'SERVICELATE', 'WORKTOTAL', 'WWORK', 'SERVICEPRICE', 'MEALPRICE', 'EDITED', 'UseHoliday', 'KasrMorSpecial', 'ExtraMorSpecial', 'WorkGroup', 'CalWork', 'EW_HoliInMission', 'EW_NormInMission', 'EW_BreakNotPerm', 'EW_BreakPerm', 'Work_Over', 'Work_Less', 'WorkBound', 'PYMorLeftUsed', 'PPERCENT1Cnt', 'PPERCENT2Cnt', 'PPERCENT3Cnt', 'PPERCENT4Cnt', 'CalCode'], 'number'],
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
        $query = PrdWork::find();

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
            'PERIOD' => $this->PERIOD,
            'DAYSPRESENT' => $this->DAYSPRESENT,
            'DAYSWORKED' => $this->DAYSWORKED,
            'EARLYPERMAMOUNT' => $this->EARLYPERMAMOUNT,
            'EARLYPERMCOUNT' => $this->EARLYPERMCOUNT,
            'EW_HOLIPERM' => $this->EW_HOLIPERM,
            'EW_HOLINOTPERM' => $this->EW_HOLINOTPERM,
            'EW_INMISSION' => $this->EW_INMISSION,
            'EW_NORMPERM' => $this->EW_NORMPERM,
            'EW_NORMNOTPERM' => $this->EW_NORMNOTPERM,
            'EW_SPECIAL' => $this->EW_SPECIAL,
            'EXTRAWORKTOTAL' => $this->EXTRAWORKTOTAL,
            'FORGIVEN_LATEAMOUNT' => $this->FORGIVEN_LATEAMOUNT,
            'FORGIVEN_LATECOUNT' => $this->FORGIVEN_LATECOUNT,
            'HG_MINUTES' => $this->HG_MINUTES,
            'HG_DAYS' => $this->HG_DAYS,
            'HT_MINUTES' => $this->HT_MINUTES,
            'HT_DAYS' => $this->HT_DAYS,
            'KASRMOR' => $this->KASRMOR,
            'LATEPERMAMOUNT' => $this->LATEPERMAMOUNT,
            'LATEPERMCOUNT' => $this->LATEPERMCOUNT,
            'LEAVEOFABSALLOTED' => $this->LEAVEOFABSALLOTED,
            'LEAVEOFABSNOPAY' => $this->LEAVEOFABSNOPAY,
            'LEAVEOFABSPAY' => $this->LEAVEOFABSPAY,
            'MISSION' => $this->MISSION,
            'MORKHASILEFT' => $this->MORKHASILEFT,
            'MORKHASIRATION' => $this->MORKHASIRATION,
            'NIGHTWORK' => $this->NIGHTWORK,
            'NONWORKTOTAL' => $this->NONWORKTOTAL,
            'NW_ABSENT' => $this->NW_ABSENT,
            'NW_ABSENTCNT' => $this->NW_ABSENTCNT,
            'NW_EARLY' => $this->NW_EARLY,
            'NW_EARLYCNT' => $this->NW_EARLYCNT,
            'NW_LATE' => $this->NW_LATE,
            'NW_LATECNT' => $this->NW_LATECNT,
            'NW_LEAVENOTPERM' => $this->NW_LEAVENOTPERM,
            'NW_LEAVENOTPERMCNT' => $this->NW_LEAVENOTPERMCNT,
            'NW_SPECIAL' => $this->NW_SPECIAL,
            'ORDMOR' => $this->ORDMOR,
            'PAYINGDAYS' => $this->PAYINGDAYS,
            'PRESENCEINDMAM' => $this->PRESENCEINDMAM,
            'PRESENCEINDMOR' => $this->PRESENCEINDMOR,
            'SERVICELATE' => $this->SERVICELATE,
            'WORKTOTAL' => $this->WORKTOTAL,
            'WWORK' => $this->WWORK,
            'SERVICEPRICE' => $this->SERVICEPRICE,
            'MEALPRICE' => $this->MEALPRICE,
            'EDITED' => $this->EDITED,
            'UseHoliday' => $this->UseHoliday,
            'KasrMorSpecial' => $this->KasrMorSpecial,
            'ExtraMorSpecial' => $this->ExtraMorSpecial,
            'WorkGroup' => $this->WorkGroup,
            'CalWork' => $this->CalWork,
            'EW_HoliInMission' => $this->EW_HoliInMission,
            'EW_NormInMission' => $this->EW_NormInMission,
            'EW_BreakNotPerm' => $this->EW_BreakNotPerm,
            'EW_BreakPerm' => $this->EW_BreakPerm,
            'Work_Over' => $this->Work_Over,
            'Work_Less' => $this->Work_Less,
            'WorkBound' => $this->WorkBound,
            'PYMorLeftUsed' => $this->PYMorLeftUsed,
            'PPERCENT1Cnt' => $this->PPERCENT1Cnt,
            'PPERCENT2Cnt' => $this->PPERCENT2Cnt,
            'PPERCENT3Cnt' => $this->PPERCENT3Cnt,
            'PPERCENT4Cnt' => $this->PPERCENT4Cnt,
            'CalCode' => $this->CalCode,
        ]);

        $query->andFilterWhere(['like', 'PERNO', $this->PERNO])
            ->andFilterWhere(['like', 'Section', $this->Section])
            ->andFilterWhere(['like', 'LastEditUserCode', $this->LastEditUserCode])
            ->andFilterWhere(['like', 'LastEditDate', $this->LastEditDate]);

        return $dataProvider;
    }
}
