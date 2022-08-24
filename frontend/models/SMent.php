<?php

namespace frontend\models;

use app\models\Interview;
use Yii;

/**
 * This is the model class for table "statament".
 *
 * @property int $id
 * @property string $name
 * @property string $family_name
 * @property string $address
 * @property string $country_of_origin
 * @property string $email_address
 * @property string $phone_number
 * @property int $age
 * @property int $hired
 */
class SMent extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statament';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'family_name', 'address', 'country_of_origin', 'email_address', 'phone_number', 'age'], 'required'],
            [['age'], 'default', 'value' => null],
            [['age', 'hired'], 'integer'],
            [['name', 'family_name'], 'string', 'max' => 25, 'min' => 5],
            [['address', 'country_of_origin'], 'string', 'max' => 255, 'min' => 10],
            [['phone_number'], 'string', 'max' => 13, 'min' => 12],
            [['email_address'], 'string', 'max' => 25],
            [['email_address'], 'email'],
            [['email_address', 'phone_number'], 'unique'],
            ['phone_number', 'match', 'pattern' => '/^\+998/']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'family_name' => 'Family Name',
            'address' => 'Address',
            'country_of_origin' => 'Country Of Origin',
            'email_address' => 'Email Address',
            'phone_number' => 'Phone Number',
            'age' => 'Age',
            'hired' => 'Hired'
        ];
    }

    public function getInterview()
    {
        return $this->hasMany(Interview::className(), ['statament_id' => 'id']);
    }
}
