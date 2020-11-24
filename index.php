<?php
    session_start();

    if (isset($_GET['partie'])) {
        $controller = "controller/c_partie.php";
    }else{
        $controller = "controller/c_lancer.php";
    }

    include($controller);
    include($view);

?>