<?php
//logout.php
session_start();

session_destroy();
header("Location:home2.php");
?>