<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "PrdWork".
 *
 * @property string $PERNO
 * @property float $PERIOD
 * @property float|null $DAYSPRESENT
 * @property float|null $DAYSWORKED
 * @property float|null $EARLYPERMAMOUNT
 * @property float|null $EARLYPERMCOUNT
 * @property float|null $EW_HOLIPERM
 * @property float|null $EW_HOLINOTPERM
 * @property float|null $EW_INMISSION
 * @property float|null $EW_NORMPERM
 * @property float|null $EW_NORMNOTPERM
 * @property float|null $EW_SPECIAL
 * @property float|null $EXTRAWORKTOTAL
 * @property float|null $FORGIVEN_LATEAMOUNT
 * @property float|null $FORGIVEN_LATECOUNT
 * @property float|null $HG_MINUTES
 * @property float|null $HG_DAYS
 * @property float|null $HT_MINUTES
 * @property float|null $HT_DAYS
 * @property float|null $KASRMOR
 * @property float|null $LATEPERMAMOUNT
 * @property float|null $LATEPERMCOUNT
 * @property float|null $LEAVEOFABSALLOTED
 * @property float|null $LEAVEOFABSNOPAY
 * @property float|null $LEAVEOFABSPAY
 * @property float|null $MISSION
 * @property float|null $MORKHASILEFT
 * @property float|null $MORKHASIRATION
 * @property float|null $NIGHTWORK
 * @property float|null $NONWORKTOTAL
 * @property float|null $NW_ABSENT
 * @property float|null $NW_ABSENTCNT
 * @property float|null $NW_EARLY
 * @property float|null $NW_EARLYCNT
 * @property float|null $NW_LATE
 * @property float|null $NW_LATECNT
 * @property float|null $NW_LEAVENOTPERM
 * @property float|null $NW_LEAVENOTPERMCNT
 * @property float|null $NW_SPECIAL
 * @property float|null $ORDMOR
 * @property float|null $PAYINGDAYS
 * @property float|null $PRESENCEINDMAM
 * @property float|null $PRESENCEINDMOR
 * @property float|null $SERVICELATE
 * @property float|null $WORKTOTAL
 * @property float|null $WWORK
 * @property float|null $SERVICEPRICE
 * @property float|null $MEALPRICE
 * @property float|null $EDITED
 * @property float|null $UseHoliday
 * @property float|null $KasrMorSpecial
 * @property float|null $ExtraMorSpecial
 * @property float|null $WorkGroup
 * @property string|null $Section
 * @property float|null $CalWork
 * @property float|null $EW_HoliInMission
 * @property float|null $EW_NormInMission
 * @property float|null $EW_BreakNotPerm
 * @property float|null $EW_BreakPerm
 * @property float|null $Work_Over
 * @property float|null $Work_Less
 * @property float|null $WorkBound
 * @property float|null $PYMorLeftUsed
 * @property float|null $PPERCENT1Cnt
 * @property float|null $PPERCENT2Cnt
 * @property float|null $PPERCENT3Cnt
 * @property float|null $PPERCENT4Cnt
 * @property float|null $CalCode
 * @property string|null $LastEditUserCode
 * @property string|null $LastEditDate
 */
class PrdWork extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'PrdWork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['PERNO', 'PERIOD'], 'required'],
            [['PERIOD', 'DAYSPRESENT', 'DAYSWORKED', 'EARLYPERMAMOUNT', 'EARLYPERMCOUNT', 'EW_HOLIPERM', 'EW_HOLINOTPERM', 'EW_INMISSION', 'EW_NORMPERM', 'EW_NORMNOTPERM', 'EW_SPECIAL', 'EXTRAWORKTOTAL', 'FORGIVEN_LATEAMOUNT', 'FORGIVEN_LATECOUNT', 'HG_MINUTES', 'HG_DAYS', 'HT_MINUTES', 'HT_DAYS', 'KASRMOR', 'LATEPERMAMOUNT', 'LATEPERMCOUNT', 'LEAVEOFABSALLOTED', 'LEAVEOFABSNOPAY', 'LEAVEOFABSPAY', 'MISSION', 'MORKHASILEFT', 'MORKHASIRATION', 'NIGHTWORK', 'NONWORKTOTAL', 'NW_ABSENT', 'NW_ABSENTCNT', 'NW_EARLY', 'NW_EARLYCNT', 'NW_LATE', 'NW_LATECNT', 'NW_LEAVENOTPERM', 'NW_LEAVENOTPERMCNT', 'NW_SPECIAL', 'ORDMOR', 'PAYINGDAYS', 'PRESENCEINDMAM', 'PRESENCEINDMOR', 'SERVICELATE', 'WORKTOTAL', 'WWORK', 'SERVICEPRICE', 'MEALPRICE', 'EDITED', 'UseHoliday', 'KasrMorSpecial', 'ExtraMorSpecial', 'WorkGroup', 'CalWork', 'EW_HoliInMission', 'EW_NormInMission', 'EW_BreakNotPerm', 'EW_BreakPerm', 'Work_Over', 'Work_Less', 'WorkBound', 'PYMorLeftUsed', 'PPERCENT1Cnt', 'PPERCENT2Cnt', 'PPERCENT3Cnt', 'PPERCENT4Cnt', 'CalCode'], 'number'],
            [['PERNO'], 'string', 'max' => 10],
            [['Section'], 'string', 'max' => 30],
            [['LastEditUserCode'], 'string', 'max' => 3],
            [['LastEditDate'], 'string', 'max' => 5],
            [['PERIOD', 'PERNO'], 'unique', 'targetAttribute' => ['PERIOD', 'PERNO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'PERNO' => 'Perno',
            'PERIOD' => 'Period',
            'DAYSPRESENT' => 'Dayspresent',
            'DAYSWORKED' => 'Daysworked',
            'EARLYPERMAMOUNT' => 'Earlypermamount',
            'EARLYPERMCOUNT' => 'Earlypermcount',
            'EW_HOLIPERM' => 'Ew Holiperm',
            'EW_HOLINOTPERM' => 'Ew Holinotperm',
            'EW_INMISSION' => 'Ew Inmission',
            'EW_NORMPERM' => 'Ew Normperm',
            'EW_NORMNOTPERM' => 'Ew Normnotperm',
            'EW_SPECIAL' => 'Ew Special',
            'EXTRAWORKTOTAL' => 'Extraworktotal',
            'FORGIVEN_LATEAMOUNT' => 'Forgiven Lateamount',
            'FORGIVEN_LATECOUNT' => 'Forgiven Latecount',
            'HG_MINUTES' => 'Hg Minutes',
            'HG_DAYS' => 'Hg Days',
            'HT_MINUTES' => 'Ht Minutes',
            'HT_DAYS' => 'Ht Days',
            'KASRMOR' => 'Kasrmor',
            'LATEPERMAMOUNT' => 'Latepermamount',
            'LATEPERMCOUNT' => 'Latepermcount',
            'LEAVEOFABSALLOTED' => 'Leaveofabsalloted',
            'LEAVEOFABSNOPAY' => 'Leaveofabsnopay',
            'LEAVEOFABSPAY' => 'Leaveofabspay',
            'MISSION' => 'Mission',
            'MORKHASILEFT' => 'Morkhasileft',
            'MORKHASIRATION' => 'Morkhasiration',
            'NIGHTWORK' => 'Nightwork',
            'NONWORKTOTAL' => 'Nonworktotal',
            'NW_ABSENT' => 'Nw Absent',
            'NW_ABSENTCNT' => 'Nw Absentcnt',
            'NW_EARLY' => 'Nw Early',
            'NW_EARLYCNT' => 'Nw Earlycnt',
            'NW_LATE' => 'Nw Late',
            'NW_LATECNT' => 'Nw Latecnt',
            'NW_LEAVENOTPERM' => 'Nw Leavenotperm',
            'NW_LEAVENOTPERMCNT' => 'Nw Leavenotpermcnt',
            'NW_SPECIAL' => 'Nw Special',
            'ORDMOR' => 'Ordmor',
            'PAYINGDAYS' => 'Payingdays',
            'PRESENCEINDMAM' => 'Presenceindmam',
            'PRESENCEINDMOR' => 'Presenceindmor',
            'SERVICELATE' => 'Servicelate',
            'WORKTOTAL' => 'Worktotal',
            'WWORK' => 'Wwork',
            'SERVICEPRICE' => 'Serviceprice',
            'MEALPRICE' => 'Mealprice',
            'EDITED' => 'Edited',
            'UseHoliday' => 'Use Holiday',
            'KasrMorSpecial' => 'Kasr Mor Special',
            'ExtraMorSpecial' => 'Extra Mor Special',
            'WorkGroup' => 'Work Group',
            'Section' => 'Section',
            'CalWork' => 'Cal Work',
            'EW_HoliInMission' => 'Ew Holi In Mission',
            'EW_NormInMission' => 'Ew Norm In Mission',
            'EW_BreakNotPerm' => 'Ew Break Not Perm',
            'EW_BreakPerm' => 'Ew Break Perm',
            'Work_Over' => 'Work Over',
            'Work_Less' => 'Work Less',
            'WorkBound' => 'Work Bound',
            'PYMorLeftUsed' => 'Py Mor Left Used',
            'PPERCENT1Cnt' => 'Ppercent1 Cnt',
            'PPERCENT2Cnt' => 'Ppercent2 Cnt',
            'PPERCENT3Cnt' => 'Ppercent3 Cnt',
            'PPERCENT4Cnt' => 'Ppercent4 Cnt',
            'CalCode' => 'Cal Code',
            'LastEditUserCode' => 'Last Edit User Code',
            'LastEditDate' => 'Last Edit Date',
        ];
    }

    /**
     * {@inheritdoc}
     * @return PrdWorkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PrdWorkQuery(get_called_class());
    }
}
