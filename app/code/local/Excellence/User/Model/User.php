<?php
class Excellence_User_Model_User extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('user/user'); // this is location of the resource file.
    }
    public function deleteUser($user_id) //delete function
     {    
      $this->setId($user_id)->delete();
     }
    public function saveUser($fields) //save function
     {
      $this->setData($fields); //data set in user table
      $this->save(); //data saved in user table
     }
    public function searchUser($fields)
     {
      $searched_data = $this->getResource()->searchUser($fields);
      return $searched_data;
     }
}