<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $request string */
/* @var $this \yii\web\View */
/* @var $club \app\models\Clubs */

?>

<div class="row">
    <div class="col-lg-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php

                $form = ActiveForm::begin();
                echo $form->field($club, 'name')->textInput();
                echo $form->field($club, 'address')->textInput();
                //echo $form->field($club, 'org_id')->textInput();
                echo Html::submitButton('Сохранить', ['class' => 'btn btn-default']);
                ActiveForm::end();

                ?>
            </div>
        </div>
    </div>
</div>

<br>
<br>

<?php

if (is_string($request)) {
    echo $request;
}

?>
