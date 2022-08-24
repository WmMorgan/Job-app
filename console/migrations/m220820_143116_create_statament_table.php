<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%statament}}`.
 */
class m220820_143116_create_statament_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%statament}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(25)->notNull(),
            'family_name' => $this->string(25)->notNull(),
            'address' => $this->string()->notNull(),
            'country_of_origin' => $this->string()->notNull(),
            'email_address' => $this->string()->notNull()->unique(),
            'phone_number' => $this->string(13)->notNull()->unique(),
            'age' => $this->integer(2)->notNull(),
            'hired' => $this->integer(1)->defaultValue(0)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%statament}}');
    }
}
