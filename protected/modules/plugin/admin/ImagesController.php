<?php

/**
 * @author   poctsy  <poctsy@foxmail.com>
 * @copyright Copyright (c) 2013 poctsy
 * @link      http://www.fircms.com
 * @version   ImagesController.php  10:53 2013年09月11日  
 */
class ImagesController extends FController {

    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'rights',
        );
    }


    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */

    public function actionCreate() {
        $model = new Images;
        $baseModel = new Base;
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $this->setCatalogList('images'); 
        
        if (isset($_POST['Images'])) {
            $model->attributes = $_POST['Images'];
         //$model->images=Helper::makeSerialize($model->images);
            $baseModel->title=$model->base_title;
            $baseModel->thumb=$model->base_thumb;
            $baseModel->keyword=$model->base_keyword;
            $baseModel->description=$model->base_description;
            $baseModel->catalog_id=$model->base_catalog_id;
             $baseModel->type =$this->plugin_id;
            if ($baseModel->save()) {

                $model->base_id = $baseModel->id;
                if ($model->save())
                    $this->redirect(array('admin'));
            }
        }
        $this->render('images_create', array(
            'model' => $model
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $baseModel = $this->loadBaseModel($model->base_id);
        $this->setCatalogList('images');
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Images']) ) {

            $model->attributes = $_POST['Images'];
            $baseModel->title=$model->base_title;
            $baseModel->thumb=$model->base_thumb;
            $baseModel->keyword=$model->base_keyword;
            $baseModel->description=$model->base_description;
            $baseModel->catalog_id=$model->base_catalog_id;
            if ($model->save() && $baseModel->save())
                $this->redirect(array('admin'));
        }

        $this->render('images_update', array(
            'model' => $model
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        $model->delete();
        $this->loadBaseModel($model->base_id)->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Images('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Images']))
            $model->attributes = $_GET['Images'];

        $this->render('images_admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Images the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Images::model()->findByPk($id);

        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function loadBaseModel($id) {
        $baseModel = Base::model()->findByPk($id);
        if ($baseModel === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $baseModel;
    }

    /**
     * Performs the AJAX validation.
     * @param Images $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'images-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function findFiles() {
        return array_diff(scandir(Yii::app()->params['uploadDir']), array('.', '..'));
    }

}
