<?php
$apiKey = "rzp_test_MEuTRqcUQjAl9H";
?>
<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>



<html>
<head>


</head>
<body>
<form action="order-history.php" method="POST">
<script
src="https://checkout.razorpay.com/v1/checkout.js"
data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
data-amount="<?php echo $_POST['tp']*100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or 299.35
data-currency="INR"//You can accept international payments by changing the currency code. Contact ou
data-order_id="<?php echo 'OID'.rand(10,100).END;?>"//Replace with the order_id generated by you in the backend.
data-buttontext="Pay with Razorpay"
data-name="Acme Corp"
data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
data-image="https://example.com/your_logo.jpg"
data-prefill.name="<?php echo $_POST['name'] ; ?>"
data-prefill.email="<?php echo $_POST['email'] ; ?>"
data-prefill.contact="<?php echo $_POST['contact'] ; ?>"
data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden">
</form>
</body>
</html>
