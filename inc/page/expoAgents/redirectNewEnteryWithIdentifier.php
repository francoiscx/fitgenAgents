<?php

include_once '.inc/required/sessions.php';

$_SESSION['newExpoEntery'] = 1;

    header('Location: http://fitgen.allapps.co.za/expo.php?id=1');

?>