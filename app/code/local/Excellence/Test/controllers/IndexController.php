<?php
class Excellence_Test_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    { 
        $this->loadLayout();            
        $this->renderLayout();

        if( $this->getRequest()->getParam('id') > 0 ) {
         try {
              $model = Mage::getModel('test/model1');

              $model->setId($this->getRequest()->getParam('id'))->delete();

             Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
             $this->_redirect('*/*/');
            } 
         catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
         }
        }

        /*================================Added for deleting table 2==================================*/
        if( $this->getRequest()->getParam('id2') > 0 ) {
         try {
              $model = Mage::getModel('test/model2');

              $model->setId($this->getRequest()->getParam('id2'))->delete();

             Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
             $this->_redirect('*/*/');
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
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $dob = $_POST['dob'];
   $indicator = 0;
   $model = Mage::getModel('test/model1')->getCollection();
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
     $model = Mage::getModel('test/model1')->load($id);
     
     $model->setFirstname($firstname);
     $model->setLastname($lastname);
     $model->setEmail($email);
     $model->setPassword($password);
     $model->setDob($dob);
     $model->save();
     $this->_redirect('*/*/');
    }
   else
    {
     $model = Mage::getModel("test/model1");
     $model->setData($postdata);
     $model->save();
      $this->_redirect('*/*/');
    }
 }

 /*===================================save action for second table===================================*/
 public function Save2Action() 
 {  
   $postdata = $this->getRequest()->getPost();
   $id = $_POST['testid'];
   $firstname = $_POST['firstname'];
   $lastname = $_POST['lastname'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $dob = $_POST['dob'];

   $indicator = 0;
   $model = Mage::getModel('test/model2')->getCollection();
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
     $model = Mage::getModel('test/model2')->load($id);
     
     $model->setFirstname($firstname);
     $model->setLastname($lastname);
     $model->setEmail($email);
     $model->setPassword($password);
     $model->setDob($dob);
     
     $model->save();
     $this->_redirect('*/*/');
    }
   else
    {
     $model = Mage::getModel("test/model2");
     $model->setData($postdata);
     
     $model->save();
      $this->_redirect('*/*/');
    }
 }
 /*========================================================================================*/

}