<?php
class Excellence_User_Model_Mysql4_Customerdetails extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/customerdetails', 'customer_id');
    }
}