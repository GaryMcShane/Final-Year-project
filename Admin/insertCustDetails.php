<?php

session_start();

include '../database/db_connect.php';

//This page is run when a user clicks submit on the customer registration page.
//It will first pull all the values in from the registration form and assign them to variables.
//It will then perform an SQL INSERT into the customer table with each of the variable values to their respected fields in this table.

$custFirstName = $_GET["custFirstName"];
$custLastName = $_GET["custLastName"];
$DOB = $_GET["DOB"];
$email = $_GET["email"];
$pword = $_GET["pword"];
$cPword = $_GET["cPword"];
$address = $_GET["address"];
$town = $_GET["town"];
$county = $_GET["county"];
$pcode = $_GET["pcode"];
$country = $_GET["country"];


$sql = "INSERT INTO customer(custFirstName,custLastName,DOB,email,pword,cPword,address,town,county,pcode,country)
VALUES('$custFirstName','$custLastName','$DOB','$email','$pword','$cPword','$address','$town','$county','$pcode','$country')";

if (mysqli_query($conn, $sql)) {
    header("Location: adduser.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
