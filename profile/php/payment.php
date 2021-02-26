<?php
session_start();
$username = $_SESSION['username'];
$full_name = $_SESSION['buyer_name'];
 require("../../instamojo/instamojo.php");


 $amount = $_GET['amount'];
 $plans = $_GET['plan'];
 $storage = $_GET['storage'];

 $api = new Instamojo\Instamojo('test_5aa4bd1835bf3539fab2f6f8ba0', 'test_2834c5b322a1e600bbb450560db',
 'https://api.instamojo.com/api/1.1');

 try {
        $response = $api->createPaymentRequest(array(
        "purpose" => "pic-drive plan",
        "amount" => $amount,
        "send_email" => true,
        "buyer_name" => $full_name,
        "email" => $username,
        "phone" => "7602400783",
        "redirect_url" => "http://localhost/pic_drive/profile/php/update_storage.php?plans=".$plans."&storage=".$storage
        ));
        //print_r($response);
        $payment_url = $response['longurl'];
        header("Location: $payment_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>