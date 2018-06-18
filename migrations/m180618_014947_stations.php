<?php

use yii\db\Migration;

/**
 * Class m180618_014947_stations
 */
class m180618_014947_stations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('stations', [
            'id' => $this->primaryKey(),
            'name' => $this->string()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('stations');

        return true;

    } // end function

} // end class
