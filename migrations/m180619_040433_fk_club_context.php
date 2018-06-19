<?php

use yii\db\Migration;

/**
 * Class m180619_040433_fk_club_context
 */
class m180619_040433_fk_club_context extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addForeignKey('fk_club_context', 'club_context', 'club_id', 'clubs', 'id');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_club_context', 'club_context');

        return true;

    } // end function

} // end class
