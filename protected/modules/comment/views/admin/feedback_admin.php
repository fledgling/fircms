<?php
/* @var $this FeedbackController */
/* @var $model Feedback */

$this->breadcrumbs=array(
	'Manage'=>array('admin'),
);

$this->menu=array(
	array('label'=>'Manage Feedback', 'url'=>array('admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#feedback-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>




<?php echo CHtml::link('高级搜索','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('feedback__search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feedback-grid',
    'cssFile'=>Yii::app()->theme->baseUrl."/css/grid.css",
    'summaryText'=>false,
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
        array('name'=>'content','value'=>'Helper::truncate_utf8_string($data->content,50)'),
        array('name'=>'status','value'=>'$data->statuslookup()','filter'=>array('1'=>'未阅读信息','2'=>'已阅读信息')),
        'name',
        'position',
        array('name'=>'create_time','type'=>'datetime'),
        array('name'=>'category','value'=>'$data->categorylookup()','filter'=>array('1'=>'索取资料','2'=>'产品购买','商务合作','其他反馈')),
        array(
			'class'=>'CButtonColumn',
            'template' => '{update},{delete}',
            'updateButtonImageUrl' => false,
            'deleteButtonImageUrl' => false,
		),
	),
)); ?>

