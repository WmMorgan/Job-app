<?php

use yii\db\Migration;

/**
 * Class m220824_054822_add_access_token_user_table
 */
class m220824_054822_add_access_token_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string()->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('{{%user}}', 'access_token', $this->string()->defaultValue(null));
    }

}
