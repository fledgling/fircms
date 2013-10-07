<?php
/**
* @version   IndexController.php
* @author    poctsy <pocmail@foxmail.com>
* @copyright Copyright (c) 2013 poctsy
* @link      http://www.fircms.com
*/

class IndexController extends FController
{
    
       public $layout='//layouts/index_column';
	/**
	 * Declares class-based actions.
	 */
 
       	public function filters()
	{
		return array(
		'rights',
		);
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{

		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}




}