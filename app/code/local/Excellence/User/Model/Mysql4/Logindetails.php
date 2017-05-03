<?php
class Excellence_User_Model_Mysql4_Logindetails extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/logindetails', 'login_id');
    }
}
?>