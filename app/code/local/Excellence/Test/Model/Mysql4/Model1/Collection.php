<?php
class Excellence_Test_Model_MySql4_Model1_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('test/model1');
    }
}
?>