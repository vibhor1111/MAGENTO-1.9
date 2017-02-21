<?php
class Excellence_Test_Model_Mysql4_Model1 extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('test/model1', 'test_id');  // here test_id is the primary of the table test. And test/test, is the magento table name as mentioned in the       //config.xml file.
    }
}