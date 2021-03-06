<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
use widgets\DatePicker
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'user_id', array('value'=>Yii::app()->user->id)); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sport_id'); ?>
		<?php echo $form->dropDownList($model,'sport_id',
				CHtml::listData(Sport::model()->findAll(),'id','name')); ?>
		<?php echo $form->error($model,'sport_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="tinymce">
        <?php echo $form->labelEx($model,'content'); ?><br />
		<?php $this->widget('application.extensions.tinymce.ETinyMce',
			array(
				'model'=>$model,
                'attribute'=>'content',
                'editorTemplate'=>'full',
				'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
                'options' => array(
                	'theme_advanced_buttons1' =>
                    	'undo,redo,|,bold,italic,underline,|,outdent, indent,|,advhr,|,sub,sup,|,bullist,numlist,|,fontsizeselect,',
                    'theme_advanced_buttons2' => 'tablecontrols,|,cut,copy,paste',
                    'theme_advanced_buttons3' => '',
                    'theme_advanced_buttons4' => '',
                    'theme_advanced_toolbar_location' => 'top',
                    'theme_advanced_toolbar_align' => 'left',
                    'theme_advanced_statusbar_location' => 'none',
                    'theme_advanced_font_sizes' => "10=10pt,11=11pt,12=12pt,13=13pt,14=14pt,15=15pt,16=16pt,17=17pt,18=18pt,19=19pt,20=20pt"
			)
		)); ?>            
		<?php echo $form->error($model,'content'); ?>                                                
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valid_to'); ?>
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker',array(
	'model'=>$model,
	'attribute'=>'valid_to',
    'name'=>'datepicker',

    'options'=>array(
        'showAnim'=>'slide',
        'dateFormat'=>'yy-mm-dd',
    ),
    'htmlOptions'=>array(
        'style'=>'height:20px;background-color:white;color:black;',
    ),
));
?>
<?php echo $form->error($model,'valid_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'important'); ?>
		<?php echo $form->checkBox($model,'important'); ?>
		<?php echo $form->error($model,'important'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Vytvoriť' : 'Uložiť'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
