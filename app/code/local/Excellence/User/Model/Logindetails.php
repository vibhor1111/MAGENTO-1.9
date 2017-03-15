<?php
class Excellence_User_Model_Logindetails extends Mage_Core_Model_Abstract
 {
    public function _construct()
     {
        parent::_construct();
        $this->_init('user/logindetails');
     }
    public function saveLoginTime($customer_name, $customer_email, $current_date, $current_time)
     {
      $this->setName($customer_name)->save();
      $this->setEmail($customer_email)->save();
      $this->setLoginDate($current_date)->save();
      $this->setLoginTime($current_time)->save();
     }
    public function saveLogoutTime($customer_name, $current_date, $current_time)
     {
      $customer_name->setLogoutDate($current_date)->setLogoutTime($current_time)->save();
     }
 }
?>