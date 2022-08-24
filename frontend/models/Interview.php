<?php

namespace app\models;

use Yii;
use frontend\models\SMent as Statament;

/**
 * This is the model class for table "interview".
 *
 * @property int $id
 * @property int $statament_id
 * @property string $interview_time
 * @property string $note
 *
 * @property Statament $statament
 */
class Interview extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interview';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['statament_id', 'interview_time', 'note'], 'required'],
            [['statament_id'], 'default', 'value' => null],
            [['statament_id'], 'integer'],
            ['statament_id', 'unique'],
            [['interview_time'], 'string', 'max' => 255],
            [['note'], 'string', 'max' => 500],
            [['statament_id'], 'exist', 'skipOnError' => true, 'targetClass' => Statament::className(), 'targetAttribute' => ['statament_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'statament_id' => 'Statament ID',
            'interview_time' => 'Interview Time',
            'note' => 'Note',
        ];
    }

    /**
     * Gets query for [[Statament]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatament()
    {
        return $this->hasOne(Statament::className(), ['id' => 'statament_id']);
    }
}
