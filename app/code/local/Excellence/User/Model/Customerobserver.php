<?php
 class Excellence_User_Model_Customerobserver
  {
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
      $order_date = Mage::getModel('core/date')->gmtDate('Y-m-d H:i:s');
      foreach ($ordered_items as $item)
       {
        $product_id = $item->getProductId();
        $product_price = $item->getPrice();
        $product_tax = $item->getTax();
        $product_name = $item->getName();
        $orderedQty = $item->getQtyOrdered();
        $total_price = $orderedQty*$product_price;
       }
       $customer_model = Mage::getModel("user/customerdetails");
       $customer_model->save_customer_details($customer_name, $customer_email, $product_name, $address, $city, $zip, $orderedQty, $total_price, $order_date); //passing parameters to the function of customerdetails model to save data in a table
    }
 }
?>