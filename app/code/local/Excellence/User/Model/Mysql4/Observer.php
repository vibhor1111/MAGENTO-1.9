<?php
class Excellence_User_Model_Mysql4_Observer extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/observer','observer_id');
    }
    
}