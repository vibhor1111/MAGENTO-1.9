<?php
class Excellence_User_Model_Address extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('user/address'); // this is location of the resource file.
    }
}