<?php
class Excellence_User_Model_LogindetailsObserver
 {
	public function customerLogin($observer) 
	 {
		$customer = $observer->getCustomer();
		$customer_name = $customer->getName();
		$customer_email = $customer->getEmail();
		$current_date=Mage::getModel('core/date')->gmtDate('Y-m-d');
		$current_time=Mage::getModel('core/date')->gmtDate('H:i:s');
		$logindetails_model = Mage::getModel("user/logindetails");
		$logindetails_model->saveLoginTime($customer_name, $customer_email, $current_date, $current_time);
	 }
	public function customerLogout($observer) 
	 {
		$customer = $observer->getCustomer();
		$current_date=Mage::getModel('core/date')->gmtDate('Y-m-d');
		$current_time=Mage::getModel('core/date')->gmtDate('H:i:s');
		$logoutdetails_model_collection = Mage::getModel("user/logindetails")->getCollection();
		$customer_name = $logoutdetails_model_collection->addFieldToFilter('name',$customer->getName())->getLastItem();
		$logoutdetails_model = Mage::getModel("user/logindetails");
		$logoutdetails_model->saveLogoutTime($customer_name, $current_date, $current_time);
	  }
}