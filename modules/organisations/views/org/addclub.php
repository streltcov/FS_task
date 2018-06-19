<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

/* @var $request string */
/* @var $this \yii\web\View */
/* @var $club \app\models\Clubs */
/* @var $context \app\models\ClubContext */

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
                echo $form->field($context, 'district')->hiddenInput()->label(false);
                echo $form->field($context, 'locality')->hiddenInput()->label(false);
                echo Html::submitButton('Сохранить', ['id' => 'addressinput']);
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
        //alert('loaded');
        $('#addressinput').addClass('btn btn-default disabled');
    });

    $('#clubs-address').keyup(function () {
        $.ajax({
            url: "/organisations/org/checkaddress",
            type: "post",
            dataType: "html",
            data: {address: $('#clubs-address').val()},
            success: function (response) {
                $('#address').html(response);
                $(document).ready(function () {
                    let validation = $('input[name="validation"]').val();
                    //console.log(validation);
                    switch (validation) {
                        case '1':
                            $('#addressinput').removeClass('btn btn-default disabled');
                            $('#addressinput').addClass('btn btn-info');
                            break;
                        default:
                            $('#addressinput').addClass('btn btn-default disabled');
                            break;
                    }
                });

                /*let district = $('input[name="district"]').val();
                console.log(district);
                let locality = $('input[name="locality"]').val();
                $('#district').val(district);
                $('#locality').val(locality);*/
            },
            error: function (req, text, error) {
                $('#address').text(text + '; type - ' + error);
            }
        })

    });

</script>
