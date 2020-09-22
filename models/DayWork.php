<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "DayWork".
 *
 * @property string $PERNO
 * @property string $DDATE
 * @property float|null $DAILYABSENCE
 * @property float|null $DAILYMAMURIAT
 * @property float|null $DAILYMORKHASI
 * @property float|null $EARLYPERMFIRST
 * @property float|null $EARLYPERMLAST
 * @property float|null $EW_HOLINOTPERM
 * @property float|null $EW_HOLIPERM
 * @property float|null $EW_INMISSION
 * @property float|null $EW_NORMNOTPERM
 * @property float|null $EW_NORMPERM
 * @property float|null $EW_SPECIAL
 * @property float|null $EXTRAWORKTOTAL
 * @property float|null $HOLIDAY
 * @property float|null $KASRMOR
 * @property float|null $LATEPERMFIRST
 * @property float|null $LATEPERMLAST
 * @property float|null $LEAVEOFABSNOPAY
 * @property float|null $LEAVEOFABSPAY
 * @property float|null $MISSION
 * @property float|null $NIGHTWORK
 * @property float|null $NONWORKTOTAL
 * @property float|null $NW_ABSENT
 * @property float|null $NW_EARLY_FIRST
 * @property float|null $NW_EARLY_LAST
 * @property float|null $NW_LATE_FIRST
 * @property float|null $NW_LATE_LAST
 * @property float|null $NW_LEAVENOTPERM
 * @property float|null $NW_SPECIAL
 * @property float|null $ORDMOR
 * @property float|null $PRESENCEINDMAM
 * @property float|null $PRESENCEINDMOR
 * @property float|null $SERVICELATE
 * @property float|null $SUSPENDED
 * @property float|null $WORKTOTAL
 * @property float|null $WWORK
 * @property float|null $SERVICEPRICE
 * @property float|null $MEALPRICE
 * @property float|null $EDITED
 * @property string|null $BeginStr
 * @property string|null $EndStr
 * @property string|null $FirstBeginDate
 * @property string|null $FirstBeginTime
 * @property string|null $LastEndDate
 * @property string|null $LastEndTime
 * @property float|null $WorkGroup
 * @property float|null $ReduceHoliday
 * @property float|null $HolidaysCounted
 * @property string|null $Section
 * @property float|null $CalWork
 * @property float|null $EW_HoliInMission
 * @property float|null $EW_NormInMission
 * @property float|null $EW_BreakNotPerm
 * @property float|null $EW_BreakPerm
 * @property float|null $PPercent
 * @property float|null $CalCode
 */
class DayWork extends \yii\db\ActiveRecord {

    public $ezafekari;
    public $kasri;
    public $nahari;
    public $kasriFaeild;

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'DayWork';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['PERNO', 'DDATE'], 'required'],
            [['DAILYABSENCE', 'DAILYMAMURIAT', 'DAILYMORKHASI', 'EARLYPERMFIRST', 'EARLYPERMLAST', 'EW_HOLINOTPERM', 'EW_HOLIPERM', 'EW_INMISSION', 'EW_NORMNOTPERM', 'EW_NORMPERM', 'EW_SPECIAL', 'EXTRAWORKTOTAL', 'HOLIDAY', 'KASRMOR', 'LATEPERMFIRST', 'LATEPERMLAST', 'LEAVEOFABSNOPAY', 'LEAVEOFABSPAY', 'MISSION', 'NIGHTWORK', 'NONWORKTOTAL', 'NW_ABSENT', 'NW_EARLY_FIRST', 'NW_EARLY_LAST', 'NW_LATE_FIRST', 'NW_LATE_LAST', 'NW_LEAVENOTPERM', 'NW_SPECIAL', 'ORDMOR', 'PRESENCEINDMAM', 'PRESENCEINDMOR', 'SERVICELATE', 'SUSPENDED', 'WORKTOTAL', 'WWORK', 'SERVICEPRICE', 'MEALPRICE', 'EDITED', 'WorkGroup', 'ReduceHoliday', 'HolidaysCounted', 'CalWork', 'EW_HoliInMission', 'EW_NormInMission', 'EW_BreakNotPerm', 'EW_BreakPerm', 'PPercent', 'CalCode'], 'number'],
            [['PERNO', 'BeginStr', 'EndStr'], 'string', 'max' => 10],
            [['DDATE', 'FirstBeginDate', 'FirstBeginTime', 'LastEndDate', 'LastEndTime'], 'string', 'max' => 5],
            [['Section'], 'string', 'max' => 30],
            [['DDATE', 'PERNO'], 'unique', 'targetAttribute' => ['DDATE', 'PERNO']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'PERNO' => 'Perno',
            'DDATE' => 'Ddate',
            'DAILYABSENCE' => 'Dailyabsence',
            'DAILYMAMURIAT' => 'Dailymamuriat',
            'DAILYMORKHASI' => 'Dailymorkhasi',
            'EARLYPERMFIRST' => 'Earlypermfirst',
            'EARLYPERMLAST' => 'Earlypermlast',
            'EW_HOLINOTPERM' => 'Ew Holinotperm',
            'EW_HOLIPERM' => 'Ew Holiperm',
            'EW_INMISSION' => 'Ew Inmission',
            'EW_NORMNOTPERM' => 'Ew Normnotperm',
            'EW_NORMPERM' => 'Ew Normperm',
            'EW_SPECIAL' => 'Ew Special',
            'EXTRAWORKTOTAL' => 'Extraworktotal',
            'HOLIDAY' => 'Holiday',
            'KASRMOR' => 'Kasrmor',
            'LATEPERMFIRST' => 'Latepermfirst',
            'LATEPERMLAST' => 'Latepermlast',
            'LEAVEOFABSNOPAY' => 'Leaveofabsnopay',
            'LEAVEOFABSPAY' => 'Leaveofabspay',
            'MISSION' => 'Mission',
            'NIGHTWORK' => 'Nightwork',
            'NONWORKTOTAL' => 'Nonworktotal',
            'NW_ABSENT' => 'Nw Absent',
            'NW_EARLY_FIRST' => 'Nw Early First',
            'NW_EARLY_LAST' => 'Nw Early Last',
            'NW_LATE_FIRST' => 'Nw Late First',
            'NW_LATE_LAST' => 'Nw Late Last',
            'NW_LEAVENOTPERM' => 'Nw Leavenotperm',
            'NW_SPECIAL' => 'Nw Special',
            'ORDMOR' => 'Ordmor',
            'PRESENCEINDMAM' => 'Presenceindmam',
            'PRESENCEINDMOR' => 'Presenceindmor',
            'SERVICELATE' => 'Servicelate',
            'SUSPENDED' => 'Suspended',
            'WORKTOTAL' => 'Worktotal',
            'WWORK' => 'Wwork',
            'SERVICEPRICE' => 'Serviceprice',
            'MEALPRICE' => 'Mealprice',
            'EDITED' => 'Edited',
            'BeginStr' => 'Begin Str',
            'EndStr' => 'End Str',
            'FirstBeginDate' => 'First Begin Date',
            'FirstBeginTime' => 'First Begin Time',
            'LastEndDate' => 'Last End Date',
            'LastEndTime' => 'Last End Time',
            'WorkGroup' => 'Work Group',
            'ReduceHoliday' => 'Reduce Holiday',
            'HolidaysCounted' => 'Holidays Counted',
            'Section' => 'Section',
            'CalWork' => 'Cal Work',
            'EW_HoliInMission' => 'Ew Holi In Mission',
            'EW_NormInMission' => 'Ew Norm In Mission',
            'EW_BreakNotPerm' => 'Ew Break Not Perm',
            'EW_BreakPerm' => 'Ew Break Perm',
            'PPercent' => 'P Percent',
            'CalCode' => 'Cal Code',
        ];
    }

    /**
     * {@inheritdoc}
     * @return DayWorkQuery the active query used by this AR class.
     */
    public static function find() {
        return new DayWorkQuery(get_called_class());
    }

}
