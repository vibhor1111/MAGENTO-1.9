<?php
class Excellence_Test_Model_Mysql4_Model2 extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('test/model2', 'test_id');  // here test_id is the primary of the table test2. And test/test2, is the magento table name as mentioned in the       //config.xml file.
    }
}