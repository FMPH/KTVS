<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $elModel El */

$this->breadcrumbs=array(
	'Akcie'=>array('index'),
	$elModel->name=>array('view', 'id'=>$elModel->id),
	$model->title,
);
if(Yii::app()->user->isGuest):
$this->menu=array(
	array('label'=>'Zoznam akcií', 'url'=>array('index')));
else:
$this->menu=array(
	array('label'=>'Zoznam akcií', 'url'=>array('index')),
	array('label'=>'Vytvoriť akciu', 'url'=>array('create')),
	array('label'=>'Upraviť akciu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Upraviť podstránku akcie', 'url'=>Yii::app()->user->getUpdateUrl('event',$model->id)),
	array('label'=>'Odstrániť akciu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Spravovať akcie', 'url'=>array('admin')),
);
endif;
?>

<h1><?php echo $model->title; ?></h1>
  <div id="element">	
  	<b><?php echo CHtml::encode($model->getAttributeLabel('content')); ?>:</b>
  	<?php echo CHtml::decode($model->content); ?>
  	<br />
  </div >	
