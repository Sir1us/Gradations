<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model backend\models\Gradations */
/* @var $form yii\widgets\ActiveForm */
?>



<div class="gradations-form">
    <div class="container-items" >
        <div class="item panel panel-default" style="padding: 10px; background:#f5f5f5;">

    <?php $form = ActiveForm::begin();?>
    <div class="row">
        <div class="col-sm-1">
    <?= $form->field($model, 'id')->textInput() ?>
        </div>
    </div>




            <?php
            // условие при котором будет открываться форма для создания таблицы (Create)
            if(!isset($gradations)) { ?>
                <h3>Create New Form</h3>
                <div class="container-items">
                    <div class="item panel panel-default" style="padding: 10px;">
                        <div class="multi-field-wrapper2 pull-left">
                            <div class="multi-fields2">
                                <div class="row multi-field2" style="padding-bottom: 10px;">
                                    <div class="col-sm-8">
                                        <div class="panel-heading">
                                        <label class="control-label" for="exampleInputIds">IDS</label>
                                            </div>
                                        <?= Html::input('raw', "Gradations[ids][0]", null, ['class'=> 'form-control', 'id' => 'exampleInputIds', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}']) ?>
                                    </div>
                                    <button type="button" class="remove-field2 remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                    <button type="button" class="add-field2 add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                        </div>




                        <div class="multi-field-wrapper pull-right">
                            <div class="multi-fields">
                                <div class="row multi-field" style="padding-bottom: 10px;">
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputPrice">Price</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[gradations][0][price]", null, ['class'=> 'form-control', 'id' => 'exampleInputPrice','placeholder'=> 'Example: 12.45', 'pattern' => '\d+(?:[.]\d{1,100}|$)$', 'required'=> true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputFrom">From</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[gradations][0][from]",null,['class'=> 'form-control', 'id' => 'exampleInputFrom', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputTo">To</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[gradations][0][to]", null, ['class'=> 'form-control', 'id' => 'exampleInputTo', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required'=> true]) ?>
                                    </div>
                                    <button type="button" class="remove-field remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                    <button type="button" class="add-field add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>

<!--            <h3>to be continued</h3>
            <div class="container-items">
                <div class="item panel panel-default" style="padding: 10px;">
                    <div class="multi-field-wrapper2 pull-left">
                        <div class="multi-fields2">
                            <div class="row multi-field2" style="padding-bottom: 10px;">
                                <div class="col-sm-8">
                                        <label class="control-label" for="exampleInputIds">...</label>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>-->


          <?php // Конец формы создания(Create)
            } else {
                // Начало условия для формы измений (Update)?>
            <h3>Update Form</h3>
            <div class="container-items">
                <div class="item panel panel-default" style="padding: 10px;">
                <?php
                // условие если поле Ids пусто, но при Update его надо создать
                if (empty($ids)) { ?>
                    <div class="multi-field-wrapper2">
                        <div class="multi-fields2">
                            <div class="row multi-field2 pull-left" style="padding-bottom: 10px;">
                                <div class="col-sm-3">
                                    <div class="panel-heading">
                                    <label class="control-label" for="exampleInputIds">IDS</label>
                                        </div>
                                    <?= Html::input('raw', "Gradations[ids][0]", null, ['class'=> 'form-control', 'id' => 'exampleInputIds', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}']) ?>
                                </div>
                                <button type="button" class="remove-field2 remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                <button type="button" class="add-field2 add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                            </div>
                        </div>
                    </div>
               <?php
                // перебираються все существующие поля ids
                } else { ?>
                    <div class="pull-left">
                <?php foreach ($ids as $keyIds => $valueIds) : ?>
                        <div class="multi-field-wrapper2">
                            <div class="multi-fields2">
                                <div class="row multi-field2" style="padding-bottom: 15px;">
                                    <div class="col-sm-8">
                                        <div class="panel-heading">
                                        <label for="exampleInputIds">IDS</label>
                                            </div>
                                      <?php  echo Html::input('raw', "Gradations[ids][{$keyIds}]", $valueIds, ['class' => 'form-control', 'id' => 'exampleInputIds']) ?>
                                    </div>
                                    <button type="button" class="remove-field2 remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                    <button type="button" class="add-field2 add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                         </div>
                    <?php endforeach;
                } ?>
                        </div>
                    <div class="pull-right">
              <?php
              // перебираються все существующие поля в массивах gradations
              foreach ($gradations as $key => $value) : ?>
                    <div class="multi-field-wrapper">
                        <div class="multi-fields">
                            <div class="row multi-field" style="padding-bottom: 10px;">
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputPrice">Price</label>
                                            </div>
                                <?= Html::input('raw', "Gradations[gradations][{$key}][price]", $value['price'], ['class' => 'form-control', 'id' => 'exampleInputPrice','placeholder'=> 'Example: 12.45', 'pattern' => '\d+(?:[.]\d{1,100}|$)$', 'required'=> true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputFrom">From</label>
                                            </div>
                                <?= Html::input('raw', "Gradations[gradations][{$key}][from]", $value['from'], ['class' => 'form-control', 'id' => 'exampleInputPrice', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputTo">To</label>
                                            </div>
                                <?= Html::input('raw', "Gradations[gradations][{$key}][to]", $value['to'] , ['class' => 'form-control', 'id' => 'exampleInputPrice', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required' => true]) ?>
                                    </div>
                                <button type="button" class="remove-field remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                <button type="button" class="add-field add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                        </div>
                    <div class="clearfix"></div>
                </div>
            </div>
           <?php }
            // конец условия для формы изменения (Update)?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
