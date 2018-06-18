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

        $this->batchInsert('users', ['username', 'password'], [
            ['admin', 'admin']
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('users');

        return true;

    } // end function

} // end class
