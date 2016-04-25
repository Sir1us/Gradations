<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Gradations */

$this->title = 'Update Gradations: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Gradations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="gradations-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'ids' => $b['ids'],
        'gradations' => $b['gradations'],
    ]) ?>

</div>
