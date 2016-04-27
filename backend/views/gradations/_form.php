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

            <?php
            $this->registerJs('
$(\'.multi-field-wrapper\').each(function() {
    var $wrapper = $(\'.multi-fields\', this);
    var $counter1 = '.(@(count($gradations) !== 0)?count($gradations):1).';
    $(".add-field", $(this)).click(function(e) {
	    // get total rows for new id in form

        // find and copy new fild
        $(\'.multi-field:first-child\', $wrapper).clone(true).appendTo($wrapper).find(\'input\').val(\'\').focus();
        console.log($(this));
        $(\'.multi-field:last-child\', $wrapper).find(\'input\').each(function(){
            var $newname = $(this).attr(\'name\').replace(/\[[0-9]+\]/g, \'[\'+$counter1+\']\');
            $(this).attr(\'name\', $newname);
        });
            $counter1++;

    });
    $(\'.multi-field .remove-field\', $wrapper).click(function() {
        if ($(\'.multi-field\').length > 1) {
            $(this).parent(\'.multi-field\').remove();
        }

    });
});

// jquery for ids fields

$(\'.multi-field-wrapper2\').each(function() {
    var $wrapper2 = $(\'.multi-fields2\', this);
    var $counter = '.(@(count($ids) !== 0)?count($ids):1).';
    $(".add-field2", $(this)).click(function(e) {
	    // get total rows for new id in form

        // find and copy new fild
        $(\'.multi-field2:first-child\', $wrapper2).clone(true).appendTo($wrapper2).find(\'input\').val(\'\').focus();
        $(\'.multi-field2:last-child\', $wrapper2).find(\'input\').each(function(){
            var $newname2 = $(this).attr(\'name\').replace(/\[[0-9]+\]/g, \'[\'+$counter+\']\');
            $(this).attr(\'name\', $newname2);
            $counter++;
        });

    });
    $(\'.multi-field2 .remove-field2\', $wrapper2).click(function() {
        if ($(\'.multi-field2\').length > 1) {
            $(this).parent(\'.multi-field2\').remove();
        }

    });
});


// jquery for sum fields

$(\'.multi-field-wrapper3\').each(function() {
    var $wrapper3 = $(\'.multi-fields3\', this);
        var $counter3 = '.(@(count($sumGradations) !== 0)?count($sumGradations):1).';
    $(".add-field3", $(this)).click(function(e) {

        // find and copy new fields
        $(\'.multi-field3:first-child\', $wrapper3).clone(true).appendTo($wrapper3).find(\'input, select\').val(\'\').focus();


                // change name of new row with input and select fields
            $(\'.multi-field3:last-child\', $wrapper3).find(\'input, select\').each(function () {
                var $newname3 = $(this).attr(\'name\').replace(/\[[0-9]+\]/g, \'[\' + $counter3 + \']\');
                $(this).attr(\'name\', $newname3);
                
            });
            $counter3++;


    });
    $(\'.multi-field3 .remove-field3\', $wrapper3).click(function() {
        if ($(\'.multi-field3\').length > 1)
            $(this).parent(\'.multi-field3\').remove();
    });
});



');
            // условие при котором будет открываться форма для создания таблицы (Create)
            if(!isset($gradations)) { ?>
                <div class="row">
                    <div class="col-sm-1">
                        <?= $form->field($model, 'id')->textInput() ?>
                    </div>
                </div>


                <h3>Create New Form</h3>
                <div class="container-items">
                    <div class="item panel panel-default" style="padding: 10px;">
                        <div class="multi-field-wrapper2 pull-left">
                            <div class="row multi-fields2" style="padding-left: 40px;">
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
                                    <div class="col-sm-1">
                                    </div>
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



<!-- Форма суммы -->

           <h3>Sum Gradations</h3>
            <div class="container-items">

                <div class="item panel panel-default" style="padding: 10px 15px 10px 10px;">
                    <div class="multi-field-wrapper3">
                        <div class="multi-fields3">
                        <div class="row multi-field3" style="padding-bottom: 10px;">
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputPrice">From</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[sumGradations][0][from]", null, ['class'=> 'form-control', 'id' => 'exampleInputPrice','placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required'=> true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputFrom">To</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[sumGradations][0][to]",null,['class'=> 'form-control', 'id' => 'exampleInputFrom', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                        <label for="exampleInputTo">Value</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[sumGradations][0][value]", null, ['class'=> 'form-control', 'id' => 'exampleInputTo', 'placeholder'=> 'Example: 12.45', 'pattern' => '\d+(?:[.]\d{1,100}|$)$', 'required'=> true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="panel-heading">
                                            <label for="exampleInputFrom">Type</label>
                                        </div>
                                        <?= Html::dropDownList("Gradations[sumGradations][0][type]", null ,["Constant" , "Percent"], ['class' => ['form-control', 'dropdown-toggle', 'btn-primary', 'btn']]) ?>
                                    </div>
                                    <button type="button" class="remove-field3 remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                    <button type="button" class="add-field3 add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>

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
                        <div class="row multi-fields2" style="padding-left: 40px;">
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

                } else {

                ?>
                    <div class="pull-left">
                <?php foreach ($ids as $keyIds => $valueIds) : ?>
                        <div class="multi-field-wrapper2">
                            <div class="row multi-fields2" style="padding-left: 40px;">
                                <div class="row multi-field2" style="padding-bottom: 10px;">
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
                                <div class="col-sm-1">
                                    </div>
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




                <h3>Sum Gradations</h3>
                <div class="container-items">
                    <div class="item panel panel-default" style="padding: 10px 15px 10px 10px;">
                     <?php
                foreach ($sumGradations as $keysum => $valuesum) : ?>
                        <div class="multi-field-wrapper3">
                            <div class="multi-fields3">
                                <div class="row multi-field3" style="padding-bottom: 10px;">
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                            <label for="exampleInputPrice">From</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[sumGradations][{$keysum}][from]", $valuesum['from'], ['class'=> 'form-control', 'id' => 'exampleInputPrice','placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required'=> true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                            <label for="exampleInputFrom">To</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[sumGradations][{$keysum}][to]",$valuesum['to'],['class'=> 'form-control', 'id' => 'exampleInputFrom', 'placeholder'=> 'Integer Number', 'pattern' => '[0-9]{1,100}', 'required' => true]) ?>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="panel-heading">
                                            <label for="exampleInputTo">Value</label>
                                        </div>
                                        <?= Html::input('raw', "Gradations[sumGradations][{$keysum}][value]", $valuesum['value'], ['class'=> 'form-control', 'id' => 'exampleInputTo', 'placeholder'=> 'Example: 12.45', 'pattern' => '\d+(?:[.]\d{1,100}|$)$', 'required'=> true]) ?>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="panel-heading">
                                            <label for="exampleInputFrom">Type</label>
                                        </div>


                                        <div class="form-group">
                                            <div class="selectContainer">
                                                    <?= Html::dropDownList("Gradations[sumGradations][{$keysum}][type]", $valuesum['type'] ,["Constant" , "Percent"], ['class' => ['form-control', 'dropdown-toggle', 'btn-primary', 'btn']]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="remove-field3 remove-item btn btn-danger btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-minus"></i></button>
                                    <button type="button" class="add-field3 add-item btn btn-success btn" style="margin-top: 45px;"><i class="glyphicon glyphicon-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
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
