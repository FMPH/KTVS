<?php
/* @var $this TvobjectController */
/* @var $model Tvobject */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tvobject-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
   <!--
	<div class="row">
		<?php //echo $form->labelEx($model,'sports'); ?><br/>
		<?php //echo $form->checkBoxList($model,'sportIds',
			//	CHtml::listData(Sport::model()->findAll(),'id','name')); ?>
		<?php //echo $form->error($model,'sports'); ?>
	</div>
       --> 
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
   <!--
	<div class="row">
		<?php //echo $form->labelEx($model,'image'); ?>
		<?php //echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php// echo $form->error($model,'image'); ?>
	</div>
      
      
	<div class="row">
		<?php //echo $form->labelEx($model,'map'); ?>
		<?php // echo $form->textArea($model,'map',array('rows'=>6, 'cols'=>50)); ?>
		<?php //echo $form->error($model,'map'); ?>
	</div>
       --> 
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Vytvoriť' : 'Uložiť'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->