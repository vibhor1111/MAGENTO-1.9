<?php
 class Excellence_User_Model_Observer2 extends Mage_Core_Model_Abstract
  {
    public function _construct()
     {
        parent::_construct();
        $this->_init('user/observer2');
     }
    public function customOrderSave($observer)
     {
      $order = $observer->getEvent()->getOrder();
      $ordered_items = $order->getAllItems();        
      $customer_name = $order->getCustomerName();
      $customer_email = $order->getCustomerEmail();
      $shippingAddress = Mage::getModel('sales/order_address')->load($order->getShippingAddress()->getId());
      $company = $shippingAddress->getCompany(); 
      $street = $shippingAddress->getStreet();
      $phone = $shippingAddress->getTelephone();
      $city = $shippingAddress->getCity();
      $zip = $shippingAddress->getPostcode();
      $region = $shippingAddress->getRegion();
      $address = implode(" ",$street);
      $order_date = Date("d/m/y");
      foreach ($ordered_items as $item)
       {
        $product_id = $item->getProductId();
        $product_tax = $item->getTax();
        $product_name = $item->getName();
        $orderedQty = $item->getQtyOrdered();
       }
      $observer_model = Mage::getModel("user/observer2");
      $observer_model->setName($customer_name)->setEmail($customer_email)->setProduct($product_name)->setStreet($address)->setCity($city)->setZip($zip)->setQuantity($orderedQty)->setOrderDate($order_date)->save();
    }
 }
?>