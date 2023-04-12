<?php
require_once('clinicclass.php');
$clinic->logout();
header("Location: login.php");
?>