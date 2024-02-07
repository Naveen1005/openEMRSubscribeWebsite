<?php
namespace Payment;
use Omnipay\Omnipay;
class Payment
{
   /**
    * @return mixed
    */
   public function gateway()
   {
       $gateway = Omnipay::create('PayPal_Express');
       $gateway->setUsername("sb-wbnh629494798_api1.business.example.com");
       $gateway->setPassword("DR3GTSRNYE9QH53N");
       $gateway->setSignature("A2086OqGOJVw4R.1d8fzSeKNBIryAKSI3kAnweoqs89Zc.26tZqKExqC");
       $gateway->setTestMode(true);
       return $gateway;
   }
   /**
    * @param array $parameters
    * @return mixed
    */
   public function purchase(array $parameters)
   {
       $response = $this->gateway()
           ->purchase($parameters)
           ->send();
       return $response;
   }
   /**
    * @param array $parameters
    */
   public function complete(array $parameters)
   {
       $response = $this->gateway()
           ->completePurchase($parameters)
           ->send();
       return $response;
   }
   /**
    * @param $amount
    */
   public function formatAmount($amount)
   {
       return number_format($amount, 2, '.', '');
   }
   /**
    * @param $order
    */
   public function getCancelUrl($order = "")
   {
       return $this->route('http://localhost/OpenEMRSubscribeNew/index.php', $order);
   }
   /**
    * @param $order
    */
   public function getReturnUrl($order = "")
   {
       return $this->route('http://localhost/OpenEMRSubscribeNew/index.php', $order);
   }
   public function route($name, $params)
   {
       return $name; // ya change hua hai
   }
}