<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Student */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="student-form">

    <?php $form = ActiveForm::begin(); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#main">Asosiy ma'lumotlar</a></li>
        <li><a data-toggle="tab" href="#parents">Ota-onasi ma'lumotlari</a></li>
        <li><a data-toggle="tab" href="#misc">Qo'shimcha ma'lumotlar</a></li>
    </ul>

    <div class="tab-content">
        <div id="main" class="tab-pane fade in active">
            <br>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'reyting_no')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'direction_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Direction::find()->all(),'id','name'),['prompt'=>' - Yo\'nalishni tanlang - ']); ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'photo')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'surname')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'birthday')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'birthplace')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'education')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'passport_serie')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'passport_number')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'passport_given')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'nationality')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'family_status')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
        </div>
        <div id="parents" class="tab-pane fade">
            <br/>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'father_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'father_workplace')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'father_phone')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'mother_name')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'mother_workplace')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'mother_phone')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'parents_address')->textarea() ?>
        </div>
        <div id="misc" class="tab-pane fade">
            <br/>
            <?= $form->field($model, 'workplace')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'living_type')->dropDownList([ 'Uy' => 'Uy', 'TTJ' => 'TTJ', 'Ijara' => 'Ijara', ], ['prompt' => '']) ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
