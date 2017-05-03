<?php
class Excellence_User_Model_MySql4_Customerdetails_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('user/customerdetails');
    }
}
?>