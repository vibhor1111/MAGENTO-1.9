<?php
class Excellence_Test_Model_Model2 extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/model2'); // this is location of the resource file.
    }
}