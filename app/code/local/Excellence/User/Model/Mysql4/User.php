<?php
class Excellence_User_Model_Mysql4_User extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {   
        $this->_init('user/user', 'user_id');
    }
    public function searchUser($fields)
     {
       $string = implode(' ', $fields);
       $connection = Mage::getSingleton('core/resource')->getConnection('core_read');
       $user_table = $this->getMainTable();
       $where = $this->_getReadAdapter()->quoteInto("user_id = ? OR ", $string).$this->_getReadAdapter()->quoteInto("firstname = ? OR ", $string).$this->_getReadAdapter()->quoteInto("lastname = ? OR ", $string).$this->_getReadAdapter()->quoteInto("email = ? OR ", $string).$this->_getReadAdapter()->quoteInto("dob = ? ", $string);
       $select = $this->_getReadAdapter()->select()->from($user_table, array('user_id'))->where($where);
       $data = $this->_getReadAdapter()->fetchAll($select); 
       return $data;
     }
}