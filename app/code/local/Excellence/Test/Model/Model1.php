<?php
class Excellence_Test_Model_Model1 extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/model1'); // this is location of the resource file.
    }
}