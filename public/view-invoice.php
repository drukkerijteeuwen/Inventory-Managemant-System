<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header("location: ../ondex.php");
}

require_once '../config/connect.php';
include_once '../src/fetch-customers.php';

$id = $_GET['id'];
$sql1 = "SELECT
    *,
    `invoices`.`id` AS `invoice_id`,
    `invoices`.`created` AS `invoice_created`,
    `invoices`.`status` AS `invoice_status`
FROM
    invoices
INNER JOIN invoice_status ON invoices.status = invoice_status.id
INNER JOIN customers ON invoices.customer_id = customers.id
INNER JOIN users ON invoices.user_id = users.id
WHERE
    `invoices`.`id` = '$id' ";

$inv_result = $con->query($sql1);
$row = $inv_result->fetch_assoc();

$fetch_items = "SELECT
    *,
    products.id AS product_nmr
FROM
    invoice_line
INNER JOIN products ON invoice_line.product_id = products.id
WHERE
    invoice_id = '$id' ";
$item_result = $con->query($fetch_items);
while ($array = $item_result->fetch_assoc()) {
    $items[] = $array;
}
?>
