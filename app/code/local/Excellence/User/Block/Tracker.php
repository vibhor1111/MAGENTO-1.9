<?php
class Excellence_User_Block_Tracker extends Mage_Core_Block_Template
 {
    public function getContent()
    {
      return Mage::getModel("user/observer2")->getCollection();
    }
 }
?>