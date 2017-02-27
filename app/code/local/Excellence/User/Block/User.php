<?php
class Excellence_User_Block_User extends Mage_Core_Block_Template
{
 
    public function getUserCollection()
	{
		return Mage::getModel('user/user')->getCollection();
	}

	public function getAddressCollection()
	{
		return Mage::getModel('user/address')->getCollection();
	}

}
?>