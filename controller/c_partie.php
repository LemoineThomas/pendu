<?php
    if ($_GET['partie'] == 'nouvelle') {
        $_SESSION["erreur"] = '0';
        $_SESSION["img"] = "asset/images/Hangman-0.png";
	    
    }else if($_GET['partie'] == 'proposition'){
        if (isset($_GET['lettre'])) {
            verificationLettre($_GET['lettre']);
        }else if (isset($_GET['mot'])) {
            verificationMot($_GET['mot']);
        }
    }

    $view = "view/v_partie.php";
?>