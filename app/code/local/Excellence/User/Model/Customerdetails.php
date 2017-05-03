<?php
class Excellence_User_Model_Customerdetails extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('user/customerdetails'); // this is location of the resource file.
    }
    public function save_customer_details($customer_name, $customer_email, $product_name, $address, $city, $zip, $orderedQty, $total_price, $order_date) //function defined to save data
     {
        $this->setName($customer_name)->save();
        $this->setEmail($customer_email)->save();
        $this->setProduct($product_name)->save();
        $this->setStreet($address)->save();
        $this->setCity($city)->save();
        $this->setZip($zip)->save();
        $this->setQuantity($orderedQty)->save();
        $this->setTotalPrice($total_price)->save();
        $this->setOrderDate($order_date)->save();
     }
}