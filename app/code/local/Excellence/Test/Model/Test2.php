<?php
class Excellence_Test_Model_Test2 extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/test2'); // this is location of the resource file.
    }
    
}