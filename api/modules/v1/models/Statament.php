<?php
declare(strict_types=1);


namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
/**
 * Application Model
 *
 * @author Morgan @europlusmp3 :D
 */
class Statament extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'statament';
    }

    /**
     * @inheritdoc
     */
    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @return array
     */
    public function fields()
    {
        return [
            'id',
            'name',
            'family_name',
            'address',
            'country_of_origin',
            'email_address',
            'phone_number',
            'age',
            'hired' => function () {
                $status = [0 => 'yangi', 1 => 'intervyu belgilangan', 2 => 'qanul qilingan', 3 => 'qabul qilinmagan'];
                return $status[$this->hired];
            },
            'interview' => function () {
                $item = $this->getInterview()->one();
                unset($item['id']);
                if ($item) return $item; else return false;

            }
        ];
    }


    /**
     * Define rules for validation
     */
        public function rules()
    {
        return [
            [['name', 'family_name', 'address', 'country_of_origin', 'email_address', 'phone_number', 'age'], 'required'],
            ['age', 'in', 'range' => range(14, 35), 'message' => "you must be between 14 and 35 years old"],
            [['age', 'hired'], 'integer'],
            [['name', 'family_name'], 'string', 'max' => 25, 'min' => 5],
            [['address', 'country_of_origin'], 'string', 'max' => 255, 'min' => 10],
            [['phone_number'], 'string', 'max' => 13, 'min' => 12],
            [['email_address'], 'string', 'max' => 25],
            [['email_address'], 'email'],
            [['email_address', 'phone_number'], 'unique'],
            ['phone_number', 'match', 'pattern' => '/^\+998/'],
            ['hired', 'default', 'value' => 0]
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInterview()
    {
        return $this->hasOne(Interview::className(), ['statament_id' => 'id']);
    }



}