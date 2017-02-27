<?php
class Excellence_User_IndexController extends Mage_Core_Controller_Front_Action
{
 public function deleteAction()
  {   
   if( $this->getRequest()->getParam('user_id') > 0 )
    {
     $user_id = $this->getRequest()->getParam('user_id');
     $user_model = Mage::getModel('user/user');
     $user_model->setId($this->getRequest()->getParam('user_id'))->delete(); //passing user id to delete data from user table
     $address_model = Mage::getModel('user/address')->getCollection();
     foreach($address_model as $data)
      {
       $address_user_id = $data->getUserid();
       if ($address_user_id == $user_id) // used to identify common user id of user table and address table
        {
         $address_id = $data->getAddressId(); //passing address id to delete data from address table
         $data->setId($address_id)->delete();
        }
      }
     $this->_redirect('*/*/index');
    }
  }
  public function saveAction() 
   {
    $fields = $this->getRequest()->getParams();
    $user_model = Mage::getModel("user/user");
    $address_model = Mage::getModel("user/address");
    $user_model->setData($fields);
    $address_model->setData($fields);
    $user_model->save();
    $user_id = $user_model->getUserId();
    $address_model->setUserid($user_id);
    $address_model->save();
    $this->_redirect('user/index/index');
   }
  public function indexAction()
   {
       $this->loadLayout();            
       $this->renderLayout();
   }
}