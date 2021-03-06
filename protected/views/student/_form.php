<?php
/* @var $this StudentController */
/* @var $model Student */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<?php if(strpos(Yii::app()->request->requestUri,'sport') !== false): ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sport_id'); ?>
		<?php echo $form->dropDownList($model,'sport_id',
				CHtml::listData(Sport::model()->findAll(),'id','name'), array('empty' => 'Vyberte šport')); ?>
		<?php echo $form->error($model,'sport_id'); ?>
	</div>
		
	<div class="row">
		<?php echo $form->labelEx($model,'skills'); ?>
		<?php echo $form->dropDownList($model,'skills', 
              array('začiatočník' => 'začiatočník', 'mierne pokročilý' => 'mierne pokročilý', 'pokročilý' => 'pokročilý'),
              array('empty' => 'Vyberte skúsenosti')); ?>
        <?php echo $form->error($model,'skills'); ?>
	</div>
	
	<?php elseif(strpos(Yii::app()->request->requestUri,'league') !== false): ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'page_id', array('label'=>'Liga')); ?>
		<?php $list=CHtml::listData(El::model()->findAllByAttributes(array('type'=>1)),'id','name'); ?>
		<?php echo CHtml::dropDownList('el_id','',$list,
			array(
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('student/dynamicPages'),
					'update'=>'#'.CHtml::activeId($model,'page_id'),
					),
				'empty'=>'Vyberte ligu',
			)
		); ?>
		<?php echo $form->dropDownList($model,'page_id', array()); ?>	
		<?php echo $form->error($model,'page_id'); ?>
	</div>
	
	<?php elseif(strpos(Yii::app()->request->requestUri,'event') !== false): ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'page_id', array('label'=>'Akcia')); ?>
		<?php $list=CHtml::listData(El::model()->findAllByAttributes(array('type'=>0)),'id','name'); ?>
		<?php echo CHtml::dropDownList('el_id','',$list,
			array(
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('student/dynamicPages'),
					'update'=>'#'.CHtml::activeId($model,'page_id'),
					),
				'empty'=>'Vyberte akciu',
			)
		); ?>
		<?php echo $form->dropDownList($model,'page_id', array()); ?>	
		<?php echo $form->error($model,'page_id'); ?>
	</div>
	
	<?php elseif(strpos(Yii::app()->request->requestUri,'course') !== false): ?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'page_id', array('label'=>'Kurz')); ?>
		<?php $list=CHtml::listData(El::model()->findAllByAttributes(array('type'=>2)),'id','name'); ?>
		<?php echo CHtml::dropDownList('el_id','',$list,
			array(
				'ajax'=>array(
					'type'=>'POST',
					'url'=>CController::createUrl('student/dynamicPages'),
					'update'=>'#'.CHtml::activeId($model,'page_id'),
					),
				'empty'=>'Vyberte kurz',
			)
		); ?>
		<?php echo $form->dropDownList($model,'page_id', array()); ?>	
		<?php echo $form->error($model,'page_id'); ?>
	</div>
	
	<?php endif ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'class'); ?>
		<?php echo $form->dropDownList($model,'class', 
              array('1' => '1.ročník', '2' => '2.ročník', '3' => '3.ročník', '4' => '4.ročník', '5' => '5.ročník'),
              array('empty' => 'Vyberte ročník')); ?>
        <?php echo $form->error($model,'class'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Prihlásiť' : 'Uložiť'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->