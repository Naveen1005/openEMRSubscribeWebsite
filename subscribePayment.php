<?php
require_once 'vendor/autoload.php';
use Omnipay\Omnipay;

    $gateway = Omnipay::create('PayPal_Express');
    $gateway->setUsername("sb-wbnh629494798_api1.business.example.com");
    $gateway->setPassword("DR3GTSRNYE9QH53N");
    $gateway->setSignature("A2086OqGOJVw4R.1d8fzSeKNBIryAKSI3kAnweoqs89Zc.26tZqKExqC");
    /*$gateway->setClientId('Aai0_2ELrzOfbAhksWkEic8uZ7ANCqVQp6AVoSPDv60AGWUn7JSjiL_4LY5jZ-gCIjPSdQN2S_UyTfl9');
    $gateway->setSecret('EP-qqCxmunjXn0wBYzNNUv18JC4_CXnNvyHLXotV93_bfE5tPVwosftD9A7o7slIULBnEZRf9Q0z3QiZ');*/
    $gateway->setTestMode(true);

    //print_r($_GET['payerID']);die();
// Send purchase request
/*$response = $gateway->searchTransactions([
    'payer_id' => $_GET['payerID'],
])->send();*/

$response = $gateway->listTransactions()->send();

// Check if the request was successful
if ($response->isSuccessful()) {
    // Payment was successful
    $getResponseData = $response->getData(); // Retrieve payment ID
    echo $getResponseData;
    // Use $paymentId as needed
} else {
    // Payment failed
    echo $response->getMessage();
}

/*$con = mysqli_connect('localhost', 'root', 'Mysql@123#','openemrsub');

// get the post records
$subFname = $_POST['fname'];
$subLname = $_POST['lname'];
$subEmail = $_POST['subEmail'];
$subAddress = $_POST['inputAddress'];
$subAddress2 = $_POST['inputAddress2'];
$subCity = $_POST['inputCity'];
$subState = $_POST['inputState'];
$subZip = $_POST['inputZip'];

// database insert SQL code
$sql = "INSERT INTO `subscriber_details` ( `fName`, `lname`, `email`,`address`, `additional_address`, `city`,`state`,`zipcode`) VALUES ('$subFname', '$subLname', '$subEmail', '$subAddress','$subAddress2','$subCity','$subState','$subZip')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	echo "Subscriber Details Saved";
}*/
