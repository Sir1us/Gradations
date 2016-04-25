<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Gradations */

$this->title = 'Create Gradations';
$this->params['breadcrumbs'][] = ['label' => 'Gradations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="gradations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
