<?php

use yii\db\Migration;

/**
 * Class m180616_181503_users
 */
class m180616_181503_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'password' => $this->string()->notNull(),
            'passwordHash' => $this->string(),
            'created_at' => $this->integer(),
            'authKey' => $this->string(),
            'accessToken' => $this->string()
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180616_181503_users cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180616_181503_users cannot be reverted.\n";

        return false;
    }
    */
}
