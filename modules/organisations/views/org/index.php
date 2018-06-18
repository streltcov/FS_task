<?php

use yii\grid\GridView;

/* @var $organisations \app\models\Organisations[]|array */
/* @var $this \yii\web\View */
?>

<br>
<br>

<div class="row">
    <div class="col-lg-10">
        <?php
        echo GridView::widget([
            'dataProvider' => $organisations,
            'tableOptions' => [
                'class' => 'table table-hover'
            ],
            'columns' => [
                'id',
                'name',
                [
                    'attribute' => 'clubs',
                    'value' => function($model) {
                        $clubs = null;
                        foreach ($model->clubs as $club) {
                            $clubs .= $club->name . '; ';
                        }
                        return $clubs;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'buttons' => [
                        'addclub' => function($url, $model) {
                                return \yii\helpers\Html::a(
                                    '<span class="glyphicon glyphicon-upload"></span>  Добавить клуб',
                                    ['/organisations/org/addclub', 'orgid' => $model->id]
                                );
                        }
                    ],
                    'template' => '{addclub}'
                ]
            ]
        ]);
        ?>
    </div>
</div>
