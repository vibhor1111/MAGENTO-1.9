<?php
class Excellence_User_IndexController extends Mage_Core_Controller_Front_Action
{
 public function saveAction() 
  {
   $fields = $this->getRequest()->getParams();
   $user_model = Mage::getModel("user/user");
   $user_model->saveUser($fields); //calling saveUser() in user model for save operation in user table
   $user_id = $user_model->getUserId();
   $address_model = Mage::getModel("user/address");
   $address_model->saveUser($fields, $user_id); //calling saveUser() in address model for save operation in address table
   $this->_redirect('*/*/index');
  }
 public function deleteAction()
  {   
   $user_model = Mage::getModel('user/user');
   $user_model->deleteUser($this->getRequest()->getParam('user_id')); //calling deleteUser() in user model for delete operation in user table
   $fields = $this->getRequest()->getParams();
   $address_model = Mage::getModel('user/address');
   $address_model->deleteUser($this->getRequest()->getParam('user_id')); //calling deleteUser() in address model for delete operation in address table
   $this->_redirect('*/*/index');
  }
 public function indexAction()
   {
       $this->loadLayout();            
       $this->renderLayout();
   }
}