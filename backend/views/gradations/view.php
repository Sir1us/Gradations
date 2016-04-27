<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Gradations */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gradations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="gradations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    
    <?php
    // массив id
    $idView = [
        'label' => 'id',
        'value' => $model->id,
    ];
    //масив ids с условием если оно пустое или в нем есть данные, вывод всех существующих ids
    if (empty($text_info['ids'])) {
         $attrib[] = [
             'label' => "ids",
             'value' => "not exists",
         ];
    } else {
             for ($in = 0; $in <= count($text_info['ids']) - 1; $in++) {
                 $attrib[] = [
                     'label' => "ids #{$in}",
                    //'value' => (is_array($text_info['ids'][$in]) ? implode(", ", $text_info['ids'][$in]) : $text_info['ids'][$in])
                     'value' => $text_info['ids'][$in],
                 ];
             }
    }
    //перечисление всех существующих полей gradations без вывода информации в самих массивах gradations
     for ($i = 0; $i <= count($text_info['gradations']) - 1; $i++) {
         $arrayAtt = [
             'label' => "gradation #{$i}",
             'value' => 'price: ' . $text_info['gradations'][$i]['price'] . '; from: ' . $text_info['gradations'][$i]['from'] . '; to: ' . $text_info['gradations'][$i]['to']
         ];
         //функция котороя к массиву ids добавила массив gradations
         array_push($attrib, $arrayAtt);
     }
    for ($if = 0; $if <= count($text_info['sumGradations']) - 1; $if++) {
        $attSum = [
            'label' => "Sum gradations {$if}",
            'value' => 'from: ' . $text_info['sumGradations'][$if]['from'] . '; to: ' . $text_info['sumGradations'][$if]['to'] . '; value: ' . $text_info['sumGradations'][$if]['value'] . '; type: ' . $text_info['sumGradations'][$if]['type']
        ];
        array_push($attrib, $attSum);
    }
    //функция которая к уже соединенным массивам ids и gradations добавила массив с id перед ними.
    array_unshift($attrib, $idView);
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => $attrib,
    ])

    ?>

</div>
