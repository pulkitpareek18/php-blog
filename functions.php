
<?php

    session_start();

    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true) {
        $loggedin= true;
    } else {
        $loggedin = false;
    }


          ?>