<!-- Page Lancer la partie 


choix du mot 
deviner une lettre, deviner un mot (modal)


enregistrement du mot en session

find des lettres ou comparaison du mot et on renvoi vers l'utilisateur -->

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