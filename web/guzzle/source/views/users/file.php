<?php
use yii\widgets\ActiveForm;
use yii\bootstrap\Alert;

//if( Yii::$app->getSession()->hasFlash('success') ) {
//    echo Alert::widget([
//        'options' => [
//            'class' => 'alert-success', //这里是提示框的class
//        ],
//        'body' => Yii::$app->getSession()->getFlash('success'), //消息体
//    ]);
//}
//if( Yii::$app->getSession()->hasFlash('error') ) {
//    echo Alert::widget([
//        'options' => [
//            'class' => 'alert-error',
//        ],
//        'body' => Yii::$app->getSession()->getFlash('error'),
//    ]);
//}
?>


<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <button>Submit</button>

<?php ActiveForm::end() ?>