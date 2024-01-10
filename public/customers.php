<?php
require_once '../src/inc/session_check.php';
require_once __DIR__ . '/../src/bootstrap.php';
view('header', ['title' => 'Customers']);

$sql = "SELECT * FROM `customers`  \n" . "ORDER BY `customers`.`last_name` ASC;";
$result = $con->query($sql);
if (!$result) {
    die("Invalid quary: " . $con->error);
}
?>

<h1>Customers</h1>
<a class="new-data" href="insertCustomers.php">Add</a>
<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php while ($rows = $result->fetch_assoc()) { ?>
            <tbody>
                <tr>
                    <td>
                        <?php echo $rows['first_name'] . ' ' . $rows['last_name']; ?>
                    </td>
                    <td>
                        <?php echo $rows['number']; ?>
                    </td>
                    <td>
                        <?php echo $rows['email']; ?>
                    </td>
                    <td>
                        <?php echo $rows['street'] . ', ' .
                            $rows['postcode'] . ', ' .
                            $rows['city'] . ', ' .
                            $rows['country']; ?>
                    </td>
                    <td>
                        <a class="edit-data" href="editcustomers.php?id=<?php echo $rows['id']; ?>">Edit</a>
                        <a class="view-data" href="view-customer.php?id=<?php echo $rows['id']; ?>">View</a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
</div>
<?php view('footer'); ?>
