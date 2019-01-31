<?php include '../database/db_connect.php'; 

$User = $_GET['UserID'];
//This statement is a simple SQL Delete which removes the seleted customer based on that customers ID. It then will re-direct back to the customer management page.
$sqlDeleteUser = "Delete FROM customer WHERE id=" . $User;
$result = $conn->query($sqlDeleteUser);

header("Location: custManage.php");	

$conn->close();

?>