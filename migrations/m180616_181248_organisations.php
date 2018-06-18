<?php

use yii\db\Migration;

/**
 * Class m180616_181248_organisations
 */
class m180616_181248_organisations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('organisations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this>$this->dropTable('organisations');

        return true;

    } // end function

} // end class
