<?php
class Excellence_Test_Model_Mysql4_Test extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('test/test', 'test_id');  // here test_id is the primary of the table test. And test/test, is the magento table name as mentioned in the       //config.xml file.
    }
}
