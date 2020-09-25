<?php

include_once './inc/required/sessions.php';
if(!isset($_SESSION['userID'])) header("Location: ./login.php");

?>