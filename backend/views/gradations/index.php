<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\GradationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gradations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Gradations', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'id',
            //'text_info:ntext',
            [
                'label'=> 'Ids',
                'value'=> function($ids_item){
                    $json = $ids_item['text_info'];
                    $array_ids = json_decode($json, true);
                    return @(is_array($array_ids['ids'])?implode(", ",$array_ids['ids']): $array_ids['ids']);
                }
            ],
            
            [
              'label'=> 'Gradations',
               'value' => function($grad_item){
                $json_grad = $grad_item['text_info'];

                   $array_grad = json_decode($json_grad, true);

                   return count($array_grad['gradations']);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
