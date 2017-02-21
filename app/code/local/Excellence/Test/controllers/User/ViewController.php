<?php
class Excellence_Test_User_ViewController extends Mage_Core_Controller_Front_Action
{
    public function historyAction()
    { 
        $this->loadLayout();            
        $this->renderLayout();    
        if( $this->getRequest()->getParam('id') > 0 ) {
         try {
              $model = Mage::getModel('test/test');

              $model->setId($this->getRequest()->getParam('id'))->delete();

             Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
             $this->_redirect('*/*/history');
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
             $this->_redirect('*/*/history');
            } 
         catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
         }
        }
        /*=============================================================================================*/

      }
 public function SaveAction() 
 {  
   $postdata = $this->getRequest()->getPost();
   $id = $_POST['testid'];
   $title = $_POST['title'];
   $filename = $_POST['filename'];
   $content = $_POST['content'];
   $status = $_POST['status'];
   $indicator = 0;
   $model = Mage::getModel('test/test')->getCollection();
   foreach($model as $data)
    {
     $id2 = $data->getTestId();
     if($id == $id2)
      {
       $indicator = 1;
      }
    }
   if($indicator == 1)
    {
     $model = Mage::getModel('test/test')->load($id);
     // $model->setData($postdata);
     $model->setTitle($title);
     $model->setFilename($filename);
     $model->setContent($content);
     $model->setStatus($status);
     $model->setUpdateTime(strtotime('now'));
     $model->save();
     $this->_redirect('test/user_view/history');
    }
   else
    {
     $model = Mage::getModel("test/test");
     $model->setData($postdata);
     $model->setCreatedTime(strtotime('now'));
     $model->save();
      $this->_redirect('test/user_view/history');
    }
 }

 /*===================================save action for second table===================================*/
 public function Save2Action() 
 {  
   $postdata = $this->getRequest()->getPost();
   $id = $_POST['testid'];
   $title = $_POST['title'];
   $filename = $_POST['filename'];
   $content = $_POST['content'];
   $status = $_POST['status'];
   $indicator = 0;
   $model = Mage::getModel('test/test2')->getCollection();
   foreach($model as $data)
    {
     $id2 = $data->getTestId();
     if($id == $id2)
      {
       $indicator = 1;
      }
    }
   if($indicator == 1)
    {
     $model = Mage::getModel('test/test2')->load($id);
     // $model->setData($postdata);
     $model->setTitle($title);
     $model->setFilename($filename);
     $model->setContent($content);
     $model->setStatus($status);
     $model->setUpdateTime(strtotime('now'));
     $model->save();
     $this->_redirect('test/user_view/history');
    }
   else
    {
     $model = Mage::getModel("test/test2");
     $model->setData($postdata);
     $model->setCreatedTime(strtotime('now'));
     $model->save();
      $this->_redirect('test/user_view/history');
    }
 }
 /*========================================================================================*/

}