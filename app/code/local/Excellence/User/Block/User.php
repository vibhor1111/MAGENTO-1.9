<?php
class Excellence_User_Block_User extends Mage_Core_Block_Template
{    
	  public function __construct()
    {
        parent::__construct();
        $collection = Mage::getModel('user/user')->getCollection();
        $this->setCollection($collection);
    }
 
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
        $toolbar = $this->getToolbarBlock();
        $collection = $this->getCollection();
       	if ($orders = $this->getAvailableOrders()) {
            $toolbar->setAvailableOrders($orders);
        }
        if ($sort = $this->getSortBy()) {
            $toolbar->setDefaultOrder($sort);
        }
        if ($dir = $this->getDefaultDirection()) {
            $toolbar->setDefaultDirection($dir);
        }
        $toolbar->setCollection($collection);
        $this->setChild('toolbar', $toolbar);
        $this->getCollection()->load();
        return $this;
	}
        public function getDefaultDirection(){
        return 'asc';
          }
    public function getAvailableOrders(){
        return array('user_id'=>'ID','firstname'=>'firstname','lastname'=>'lastname','DOB'=>'dob');
    }
    public function getSortBy(){
        return 'user_id';
    }
    public function getToolbarBlock()
    {
        $block = $this->getLayout()->createBlock('user/toolbar', microtime());
        return $block;
    }
    public function getMode()
    {
        return $this->getChild('toolbar')->getCurrentMode();
    }
 
    public function getToolbarHtml()
    {
        return $this->getChildHtml('toolbar');
    }
 
 
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