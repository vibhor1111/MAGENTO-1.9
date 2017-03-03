<?php
class Excellence_User_Model_Address extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('user/address'); // this is location of the resource file.
    }
    public function deleteUser($user_id) //delete function
     { 
      $address_model = $this->getCollection();
      foreach($address_model as $data)
       {
        $address_user_id = $data->getUserid();
        if ($address_user_id == $user_id) // used to identify common user id of user table and address table
         {
          $address_id = $data->getAddressId(); //passing address id to delete data from address table
          $data->setId($address_id)->delete();
         }
       }
     }
    public function saveUser($fields, $user_id) //save function
     {   
      $this->setData($fields); //data set in address table
      $this->setUserid($user_id); //common user_id set in address table for further sql operations
      $this->save(); //data saved in address table
     }
    public function addressUser($fields)
     {
      $searched_data = $this->getResource()->addressUser($fields);
      return $searched_data;
     }
}