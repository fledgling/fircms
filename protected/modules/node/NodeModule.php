<?php
/**
* @version NodeModule.php
* @author    poctsy <poctsy@foxmail.com>
* @copyright Copyright (c) 2013 poctsy
* @link      http://www.fircms.com
*/
class NodeModule extends FModule
{

    public $flashSuccessKey = 'NodeSuccess';
    public $flashErrorKey = 'NodeError';

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'node.models.*',
            'node.components.*',
        ));
        $this->setControllerPath($this->controllerPath);
        $this->setViewPath($this->viewPath);
       
    }

 
    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

}
