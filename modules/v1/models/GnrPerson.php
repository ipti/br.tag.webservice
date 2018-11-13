<?php

namespace app\modules\v1\models;

use yii\mongodb\ActiveRecord;
use MongoDB\BSON\ObjectId;
use MongoDB\BSON\UTCDateTime;
use \DateTime;
use Yii;

class GnrPerson extends ActiveRecord
{
    public const SCENARIO_MIGRATION = 'MIGRATION';
    public const SCENARIO_CREATE = 'CREATE';
    public const SCENARIO_UPDATE = 'UPDATE';
    public const SCENARIO_READ = 'READ';

    /**
     * @return string the name of the index associated with this ActiveRecord class.
     */
    public static function collectionName()
    {
        return 'gnr_person';
    }

    /**
     * @return array list of attribute names.
     */
    public function attributes()
    {
        return [
            '_id',
            'id_hash',
            'id_inep',
            'id_cpf',
            'id_nis',
            'id_civil_register',
            'id_email',
            'fullname',
            'filiation_type',
            'filiation_1',
            'filiation_2',
            'birthday',
            'birthday_nacionality',
            'birthday_country',
            'birthday_city',
            'gender',
            'skin_tone',
            'address',
            'deficiency',
            'scholarity',
            'high_school_type',
            'college_details',
            'no_documents_desc',
        ];
    }

    public function rules()
    {
        return [
            // Scenario Migration
            [
                [
                    'id_hash',
                    'id_inep',
                    'id_cpf',
                    'id_nis',
                    'id_civil_register',
                    'id_email',
                    'fullname',
                    'filiation_type',
                    'filiation_1',
                    'filiation_2',
                    'birthday',
                    'birthday_nacionality',
                    'birthday_country',
                    'birthday_city',
                    'gender',
                    'skin_tone',
                    'address',
                    'deficiency',
                    'scholarity',
                    'high_school_type',
                    'college_details',
                    'no_documents_desc'
                ],
                'safe', 'on' => self::SCENARIO_MIGRATION
            ]
        ];
    }

    public function beforeSave($insert){

        switch ($this->scenario) {
            case self::SCENARIO_MIGRATION:
                if(!is_null($this->birthday)){
                    $dateFormat = DateTime::createFromFormat('d/m/Y', $this->birthday);
                    $birthday = new DateTime($dateFormat->format('Y-m-d H:i:s'));
                    $this->birthday = new UTCDateTime($birthday->getTimeStamp());
                }
            break;
        }
        return true;
    }
}