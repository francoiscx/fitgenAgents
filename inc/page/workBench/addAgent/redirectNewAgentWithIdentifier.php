<?php

include_once '.inc/required/sessions.php';

$_SESSION['newAgentEntery'] = 1;

    header('Location: http://fitgen.allapps.co.za/workbench.php?id=1');

?>