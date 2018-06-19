<?php

use yii\db\Migration;

/**
 * Class m180619_033102_club_context
 */
class m180619_033102_club_context extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->createTable('club_context', [
            'id' => $this->primaryKey(),
            'club_id' => $this->integer(),
            'district' => $this->string(),
            'locality' => $this->string()
        ]);

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropTable('club_context');

        return true;

    } // end function

} // end class
