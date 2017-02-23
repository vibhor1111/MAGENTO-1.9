<?php
class Excellence_User_IndexController extends Mage_Core_Controller_Front_Action
{
    public function deleteAction()
    {   
        if( $this->getRequest()->getParam('user_id') > 0 ) {
         try {
              $user_model = Mage::getModel('user/user');
              $address_model = Mage::getModel('user/address');
              $user_model->setId($this->getRequest()->getParam('user_id'))->delete();
              $address_model->setId($this->getRequest()->getParam('user_id'))->delete();
              Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
              $this->_redirect('*/*/index');
             } 
         catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
         }
        }
      }
  public function saveAction() {
    $fields = $this->getRequest()->getParams();
    $user_model = Mage::getModel("user/user");
    $address_model = Mage::getModel("user/address");
    $user_model->setData($fields);
    $address_model->setData($fields);
    $user_model->save();
    $address_model->save();
    $this->_redirect('user/index/index');
  }
  public function indexAction()
   {
       $this->loadLayout();            
       $this->renderLayout();
   }

}