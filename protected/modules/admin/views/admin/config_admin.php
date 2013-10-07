<?php
/* @var $this ConfigController */
/* @var $model Config */

$this->breadcrumbs=array(
	'Configs'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Config', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#config-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'config-grid',
    'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'dataProvider'=>$model->search(),
    'columns'=>array(
		'key',
		'value',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}',
            'updateButtonImageUrl'=>false,
		),
	),
)); ?>
