<?php
/* @var $this NavigationController */
/* @var $model Navigation */

$this->breadcrumbs=array(
	'Navigations'=>array('admin'),
	'Update',
);

$this->menu = array(
    array('label' =>"创建导航条", 'url' => array('create')),
    array('label' =>"添加链接到导航条", 'url' => array('childcreate')),
    array('label' =>"管理导航条", 'url' => array('admin')),
);
?>



<?php $this->renderPartial('navigation__form', array('model'=>$model)); ?>