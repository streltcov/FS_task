<?php

use yii\db\Migration;

/**
 * Class m180618_031223_fk_organisations
 */
class m180618_031223_fk_organisations extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->addForeignKey('fk_club', 'clubs', 'org_id', 'organisations', 'id');

    } // end function



    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_club', 'clubs');

        return true;

    } // end function

} // end class
