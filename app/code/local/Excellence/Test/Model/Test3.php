<?php
class Excellence_Test_Model_Test extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/test3'); // this is location of the resource file.
    }
    
}