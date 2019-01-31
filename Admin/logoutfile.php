<?php

//This file simply just destroys the session when the user logs out and re-directs them back to the home page.

session_start();
session_destroy();
header("location: ../index.php");

?>