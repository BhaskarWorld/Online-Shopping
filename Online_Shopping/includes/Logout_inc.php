<?php
session_start();
unset($_SESSION['CustomerID']);
unset($_SESSION['CustomerName']);

header("Location: ../home.php");
?>