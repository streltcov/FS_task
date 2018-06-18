<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $organisation \app\models\Organisations */

?>

<div class="row">
    <div class="col-lg-7">
        <div class="panel-heading">
            <b>Добавить организацию</b>
        </div>
        <div class="panel panel-default">
            <div class="panel panel-body">
                <?php

                $form = ActiveForm::begin();
                echo $form->field($organisation, 'name')->textInput();
                echo Html::submitButton('Отправить', ['class' => 'btn btn-info']);
                ActiveForm::end();

                ?>
            </div>
        </div>
    </div>
</div>
