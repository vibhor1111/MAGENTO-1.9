<?php
class Excellence_User_Model_Mysql4_Observer2 extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/observer2', 'observer_id');
    }
}
?>