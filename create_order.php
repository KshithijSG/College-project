<?php
session_start();
error_reporting(0);
include('includes/config.php');
require('razorpay-php/Razorpay.php'); // Path to the Razorpay SDK file

if (strlen($_SESSION['login']) == 0) {
    header('location:login.php');
} else {
    if (isset($_POST['submit'])) {
        $paymentMethod = $_POST['paymethod'];

        // Create a new order in the database
        $sql = "INSERT INTO orders (userId, paymentMethod) VALUES ('".$_SESSION['id']."', '".$paymentMethod."')";
        mysqli_query($con, $sql);

        $orderId = mysqli_insert_id($con);

        // Generate the Razorpay order
        $razorpayKey = 'rzp_test_MEuTRqcUQjAl9H'; // Replace with your Razorpay Key ID
        $razorpaySecret = '31rbNeh78gADQX8ESZiROzex'; // Replace with your Razorpay Key Secret
        $api = new Razorpay\Api\Api($razorpayKey, $razorpaySecret);

        $amount = $_SESSION['tp']="$totalprice"; // Set the amount according to your requirements
        $currency = 'INR';

        $orderData = [
            'receipt' => 'order_'.$orderId,
            'amount' => $amount * 100, // Razorpay amount is in paise, so multiply by 100
            'currency' => $currency,
        ];

        $razorpayOrder = $api->order->create($orderData);

        $_SESSION['razorpay_order_id'] = $razorpayOrder['id'];
        $_SESSION['order_id'] = $orderId;

        // Redirect the user to the Razorpay payment page
        header('Location: ' . $razorpayOrder['receipt']);
    }
}
?>
<!-- Remaining HTML code for the payment page -->
