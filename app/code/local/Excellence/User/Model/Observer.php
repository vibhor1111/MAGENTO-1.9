<?php
class Excellence_User_Model_Observer extends Mage_Core_Model_Abstract
 {
    public function _construct()
    {
        parent::_construct();
        $this->_init('user/observer');
    }
	public function customerLogin($observer) {
		$customer = $observer->getCustomer();
		 $current_date=date("m/d/Y");
		 $current_time=date("h:i:sa");
		 $observer_model = Mage::getModel("user/observer");
		 $observer_model->setName($customer->getName())->setEmail($customer->getEmail())->setLoginDate($current_date)->setLoginTime($current_time)->save();
	}
	public function customerLogout($observer) {
		$customer = $observer->getCustomer();
		 $current_date=date("m/d/Y");
		 $current_time=date("h:i:sa");
		 $observer_model = Mage::getModel("user/observer")->getObserverCollection();
         $observer_model->addFieldToFilter('name',$customer->getName())->getLastItem()->setLogoutDate($current_date)->setLogoutTime($current_time)->save();
	 }
}