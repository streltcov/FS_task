<?php

use yii\grid\GridView;

/* @var $this \yii\web\View */
/* @var $clubsDataprovider \yii\data\ActiveDataProvider */

?>

<?php

echo GridView::widget([
    'dataProvider' => $clubsDataprovider
])

?>
