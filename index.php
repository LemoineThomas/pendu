<!-- Page Lancer la partie 


choix du mot 
deviner une lettre, deviner un mot (modal)


enregistrement du mot en session

find des lettres ou comparaison du mot et on renvoi vers l'utilisateur -->

<?php

    if (isset($GET['partie'])) {
        $controller = "controller/c_partie.php";
    }

    include($controller);
    include($view);

?>