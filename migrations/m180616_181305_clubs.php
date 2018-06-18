<?php

use yii\db\Migration;

/**
 * Class m180616_181305_clubs
 */
class m180616_181305_clubs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('clubs', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'org_id' => $this->integer()->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('clubs');

        return true;

    } // end function

} // end class
