<?php
require_once '../config/connect.php';

$customer =             $_POST['customer_select'];
$number =               $_POST['customer_number'];
$mail =                 $_POST['customer_mail'];
$status =               $_POST['invoice_status'];

$shipping_name =        $_POST['shipping_name'];
$shipping_company =     $_POST['shipping_company'];
$shipping_street =      $_POST['shipping_street'];
$shipping_postalcode =  $_POST['shipping_postalcode'];
$shipping_city =        $_POST['shipping_city'];
$shipping_country =     $_POST['shipping_country'];
$billing_name =         $_POST['billing_name'];
$billing_company =      $_POST['billing_company'];
$billing_street =       $_POST['billing_street'];
$billing_postalcode =   $_POST['billing_postalcode'];
$billing_city =         $_POST['billing_city'];
$billing_country =      $_POST['billing_country'];

$sql1 = "INSERT INTO invoices
(id, status, user_id, number, mail,
shipping_name, shipping_company, shipping_street, shipping_postalcode, shipping_city, shipping_country,
billing_name, billing_company, billing_street, billing_postalcode, billing_city, billing_country,
updated, created)
VALUES
('$shipping_name', '$shipping_company', '$shipping_street', '$shipping_postalcode', '$shipping_city', '$shipping_country',
'$billing_name', '$billing_company', '$billing_street', '$billing_postalcode', '$billing_city', '$billing_country'
current_timestamp(), current_timestamp()";

$item1 = "";
$item2 = "";

$sql2 = "";
