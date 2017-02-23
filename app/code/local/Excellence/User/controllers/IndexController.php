<?php
class Excellence_User_IndexController extends Mage_Core_Controller_Front_Action
{
    public function deleteAction()
    {     
       if( $this->getRequest()->getParam('id') > 0 ) {
         try {
              $model = Mage::getModel('user/user');
              $model2 = Mage::getModel('user/address');

              $model->setId($this->getRequest()->getParam('id'))->delete();
              $model2->setId($this->getRequest()->getParam('id'))->delete();

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
              $model = Mage::getModel('user/address');

              $model->setId($this->getRequest()->getParam('id2'))->delete();

             Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item was successfully deleted'));
             $this->_redirect('*/*/');
            } 
         catch (Exception $e) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            $this->_redirect('*/*/');
         }
        }
     }
public function saveAction() {
  $fields = $this->getRequest()->getParams();
  $model = Mage::getModel('user/user')->getCollection();
     $model = Mage::getModel("user/user");
     $model->setData($fields);
     $model->save();
     $this->_redirect('*/*/');
    
    // }
}
 /*===================================save action for second table===================================*/
 
 public function indexAction() 
    { 
        $this->loadLayout();            
        $this->renderLayout();
    }
 /*========================================================================================*/
 
}