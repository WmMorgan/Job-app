<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%interview}}`.
 */
class m220822_082651_create_interview_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%interview}}', [
            'id' => $this->primaryKey(),
            'statament_id' => $this->integer()->notNull()->unique(),
            'interview_time' => $this->string()->notNull(),
            'note' => $this->string(500)->notNull()
        ]);
        $this->addForeignKey(
            'fk-statament',
            'interview',
            'statament_id',
            'statament',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey(
            'fk-statament',
            'interview'
        );
        $this->dropTable('{{%interview}}');
    }
}
