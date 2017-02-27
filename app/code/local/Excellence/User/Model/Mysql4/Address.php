<?php
class Excellence_User_Model_Mysql4_Address extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/address', 'address_id');
    }
}