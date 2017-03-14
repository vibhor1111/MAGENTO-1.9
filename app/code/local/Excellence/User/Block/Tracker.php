<?php
class User_Tracker_Block_Tracker extends Mage_Core_Block_Template
 {
    public function getContent()
    {
      return Mage::getModel("tracker/observer")->getCollection();
    }
 }
?>