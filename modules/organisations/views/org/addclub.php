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
            <div class="panel panel-heading">
                <h3>Добавить клуб</h3>
            </div>
            <div class="panel-body">
                <?php

                $form = ActiveForm::begin();
                echo $form->field($club, 'name')->textInput();
                echo $form->field($club, 'address')->textInput();
                echo Html::submitButton('Сохранить', ['id' => 'addressinput', 'class' => 'btn btn-info']);
                ActiveForm::end();

                ?>
            </div>
        </div>
    </div>
    <div id="address" class="col-lg-5">
        <?php

        if (is_string($request)) {
            echo $request;
        }

        ?>
    </div>
</div>

<br>
<br>

<script>

    $(document).ready(function() {
        alert('loaded');
    });

    //let address = $('#clubs-address').val();

    $('#clubs-address').keyup(function () {
        //console.log(address);

        $.ajax({
            url: "/organisations/org/checkaddress",
            type: "post",
            dataType: "html",
            data: {address: $('#clubs-address').val()},
            success: function (response) {
                $('#address').html(response);
            },
            error: function (req, text, error) {
                $('#address').text(text + '; type - ' + error);
            }
        })

    });

</script>
