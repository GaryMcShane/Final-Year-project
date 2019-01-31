<?php include '../database/db_connect.php'; 

$Product = $_GET['ProdID'];
//This statement is a simple SQL Delete which removes the seleted product based on that products ID. It then will re-direct back to the product management page.
$sqlDeleteProduct = "Delete FROM products WHERE Product_ID =" . $Product;
$result = $conn->query($sqlDeleteProduct);

header("Location: prodUpdate.php");	

$conn->close();

?>