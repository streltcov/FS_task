<?php

namespace app\modules\organisations;

/**
 * modules module definition class
 */
class OrganisationModule extends \yii\base\Module
{

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\organisations\controllers';
    public $defaultRoute = '/org';

    /**
     * {@inheritdoc}
     */
    public function init()
    {

        parent::init();
        // custom initialization code goes here
    }

} // end class
