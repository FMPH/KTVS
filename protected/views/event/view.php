<?php
/* @var $this EventController */
/* @var $model El */

$this->breadcrumbs=array(
	'Akcie'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Zoznam akcií', 'url'=>array('index')),
	array('label'=>'Vytvoriť akciu', 'url'=>array('create')),
	array('label'=>'Upraviť akciu', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Odstrániť akciu', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Spravovať akciu', 'url'=>array('admin')),
	array('label'=>'Vytvoriť podstránku', 'url'=>array('event/createPage')),
	/*array('label'=>'Upraviť podstránku', 'url'=>array('event/updatePage', 'id'=>$model->id)),*/
);
?>

<h1><?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'name',
		'description',
		'type',
		'updated_at',
	),
)); ?>
