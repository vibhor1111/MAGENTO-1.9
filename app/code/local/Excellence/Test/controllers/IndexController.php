<?php
class Excellence_Test_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    { 
        $this->loadLayout();            
        $this->renderLayout();    
        if( $this->getRequest()->getParam('id') > 0 ) {
         try {
              $model = Mage::getModel('test/test');

              $model->setId($this->getRequest()->getParam('id'))->delete();

             Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
             $this->_redirect('*/*/index');
            } 
         catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
         }
        }

        /*================================Added for deleting table 2==================================*/
        if( $this->getRequest()->getParam('id2') > 0 ) {
         try {
              $model = Mage::getModel('test/test2');

              $model->setId($this->getRequest()->getParam('id2'))->delete();

             Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
             $this->_redirect('*/*/index');
            } 
         catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
         }
        }
        /*=============================================================================================*/

      }
 public function SaveAction() {
  $id = $this->getRequest()->getParam('testid');
  $title = $this->getRequest()->getParam('title');
  $filename = $this->getRequest()->getParam('filename');
  $content = $this->getRequest()->getParam('content');
  $status = $this->getRequest()->getParam('status');
  $fields = $this->getRequest()->getParams();
  $indicator = 0;
  $model = Mage::getModel('test/test')->getCollection();
  foreach($model as $data)
   {
    $existing_id = $data->getTestId();
    if($id == $existing_id)
     {
      $indicator = 1;
     }
   }
  if($indicator == 1)
    {
     $model = Mage::getModel('test/test')->load($id);
     $model->setTitle($title);
     $model->setFilename($filename);
     $model->setContent($content);
     $model->setStatus($status);
     $model->setUpdateTime(strtotime('now'));
     $model->save();
     $this->_redirect('test/index/index');
    }
   else
    {
     $model = Mage::getModel("test/test");
     $model->setData($fields);
     $model->setCreatedTime(strtotime('now'));
     $model->save();
      $this->_redirect('test/index/index');
    }
}

 /*===================================save action for second table===================================*/
 public function Save2Action() 
 {  
  $id = $this->getRequest()->getParam('testid');
  $title = $this->getRequest()->getParam('title');
  $filename = $this->getRequest()->getParam('filename');
  $content = $this->getRequest()->getParam('content');
  $status = $this->getRequest()->getParam('status');
  $fields = $this->getRequest()->getParams();
  $indicator = 0;
  $model = Mage::getModel('test/test2')->getCollection();
  foreach($model as $data)
   {
    $existing_id = $data->getTestId();
    if($id == $existing_id)
     {
      $indicator = 1;
     }
   }
  if($indicator == 1)
    {
     $model = Mage::getModel('test/test2')->load($id);
     $model->setTitle($title);
     $model->setFilename($filename);
     $model->setContent($content);
     $model->setStatus($status);
     $model->setUpdateTime(strtotime('now'));
     $model->save();
     $this->_redirect('test/index/index');
    }
   else
    {
     $model = Mage::getModel("test/test2");
     $model->setData($fields);
     $model->setCreatedTime(strtotime('now'));
     $model->save();
      $this->_redirect('test/index/index');
    }
 }
 /*========================================================================================*/

}