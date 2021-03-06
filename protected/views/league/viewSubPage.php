<?php
/* @var $this PageController */
/* @var $model Page */
/* @var $elModel El */

$this->breadcrumbs=array(
	'Ligy'=>array('index'),
	$elModel->name=>array('view', 'id'=>$elModel->id),
  $model->title,
);
if(Yii::app()->user->isGuest):
$this->menu=array(
	array('label'=>'Zoznam líg', 'url'=>array('index')));
else:
$this->menu=array(
	array('label'=>'Zoznam líg', 'url'=>array('index')),
	array('label'=>'Vytvoriť ligu', 'url'=>array('create')),
	array('label'=>'Upraviť ligu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Upraviť podstránku ligy', 'url'=>Yii::app()->user->getUpdateUrl('league',$model->id)),
	array('label'=>'Odstrániť ligu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Spravovať ligy', 'url'=>array('admin')),
);
endif;
?>

<h1><?php echo $model->title; ?></h1>
  <div id="element">	
  	<?php echo CHtml::decode($model->content); ?>
  	<br />
  </div>