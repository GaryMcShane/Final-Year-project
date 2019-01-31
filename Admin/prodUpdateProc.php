<?php include '../database/db_connect.php';

session_start();

//This page will update the product based on the value that the previous form submitted. 
//It will first get the product ID of the selected product and the new price that has been inputted.
//It will then carry out an SQL UPDATE statement with the new price and update the products table with this. 
//Finially it will re-direct back to the products management page.

$Product = $_GET['ProductID'];
$ProductPrice = $_POST["Price"];
$ProductePrice = $_POST["ePrice"];

$sqlUpdateProduct = "UPDATE products SET Price='$ProductPrice' WHERE Product_ID =" . $Product;
$result = $conn->query($sqlUpdateProduct);
$sqlUpdateEProduct = "UPDATE products SET ePrice='$ProductePrice' WHERE Product_ID =" . $Product;
$result = $conn->query($sqlUpdateEProduct);

if (mysqli_query($conn, $sqlUpdateProduct)) {
    header("Location: prodUpdate.php");	
} else {
    echo "Error: " . $sqlUpdateProduct . "<br>" . mysqli_error($conn);
}
if (mysqli_query($conn, $sqlUpdateEProduct)) {
    header("Location: prodUpdate.php");	
} else {
    echo "Error: " . $sqlUpdateEProduct . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>