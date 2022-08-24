<?php

use yii\db\Migration;

/**
 * Class m220821_120015_create_admin_account
 */
class m220821_120015_create_admin_account extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}',
            [
                'username' => "morgan",
                'auth_key' => "M79zmQqnktl9vywY63EEr1k07VkrB53v",
                'password_hash' => '$2y$13$8FWtvpH6fF5sQnU1nQRMouwkI0YMsBCht1vFtHDsSdxIHdVfONfTi',
                'email' => 'morganuz@mail.ru',
                'status' => 20,
                'created_at' => time(),
                'updated_at' => time()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220821_120015_create_admin_account >>>hamma userlar tozalandi.\n";
        $this->truncateTable('user');
    }


}
