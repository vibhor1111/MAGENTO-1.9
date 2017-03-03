<?php
class Excellence_User_Model_Mysql4_Address extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/address', 'address_id');
    }
    public function addressUser($fields)
     {
       $string = implode(' ', $fields);
       $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
       $table = $this->getMainTable();
       $where = $this->_getReadAdapter()->quoteInto("userid = ? OR ", $string).$this->_getReadAdapter()->quoteInto("city = ? OR ", $string).$this->_getReadAdapter()->quoteInto("pincode = ? OR ", $string).$this->_getReadAdapter()->quoteInto("contacts = ? ", $string);
       $select = $this->_getReadAdapter()->select()->from($table, array('userid'))->where($where);
       $data = $this->_getReadAdapter()->fetchAll($select);
       return $data;
     }
}