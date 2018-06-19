<?php

use yii\helpers\Html;

/* @var $data mixed */
/* @var $this \yii\web\View */
/* @var $flag bool */
/* @var $context string */
/* @var $metro mixed */

?>

<div class="alert alert-success">Адрес найден</div>

<?php

$check1 = strpos($data['description'], 'Москва');
$check2 = strpos($data['description'], 'Московская область');

if ($check1 === false && $check2 === false) {
    echo "<div class='alert alert-danger'>Указанный адрес находится за пределами Москвы или Московской
    области. Уточните данные или введите другой адрес</div>";

    echo "<div class='alert alert-warning'>" . $data['description'] . "<div>";

    $end = true;

} else {
    $end = false;
}

?>

<?php

if(!$end) {

    echo "<div class='alert alert-info'>" . $data['description'] . "<br>" . $data['name'] . "</div>";

    echo "<div class='alert alert-info'>" . $context['district'] . "<br>" . $context['locality'] . "</div>";

    echo Html::input('hidden', 'validation', '1', ['id' => 'validation']);

    echo Html::input('hidden', 'district', $context['district'], ['id' => 'district']);
    echo Html::input('hidden', 'locality', $context['locality'], ['id' => 'locality']);

    \yii\helpers\VarDumper::dump($metro);
}

?>

<br>
<br>
