<?php

include_once '.inc/required/sessions.php';

$_SESSION['newExpoEntery'] = 1;

    header('Location: ./expo.php?id=1');

?>