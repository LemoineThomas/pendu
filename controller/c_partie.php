<?php
    //on lance une nouvelle partie et on initialise les variables
    if ($_GET['partie'] == 'nouvelle') {
        $_SESSION["erreur"] = '0';
        $_SESSION["img"] = "asset/images/Hangman-0.png";
        $_SESSION["message"] = "";
        $_SESSION["trouve"] = 0;

        //on récupère le dictionnaire
	    $dictionnaire = file_get_contents("dictionnaire.json");
        $json_a = json_decode($dictionnaire, true);

        //on récupère un mot au hasard dans le dictionnaire
        $motNum = array_rand($json_a['dictionnaire'], 1);
        $_SESSION["mot"] = $json_a['dictionnaire'][$motNum];

        //td correspond au mot caché (_ _ _ _ _) qu'on injectera dans le tableau html
        $td= "";
        $motPendu = array();
        for ($index=0; $index < strlen ($_SESSION["mot"]); $index++) {
            array_push($motPendu, "_");
            $td = $td . "<td id='". $index ."'>". $motPendu[$index] ."</td>";
        }

        $_SESSION["motPendu"] = $motPendu; 
        $_SESSION["td"] = $td;

    //lorsque l'utilisateur fait une proposition de lettre
    }else if($_GET['partie'] == 'proposition'){
        //on verifie que le get est présent
        if (isset($_GET['lettre'])) {

            $lettre = $_GET['lettre'];
            $mot = $_SESSION['mot'];
            $erreur = $_SESSION['erreur'];

            //indexMot sert a récupérer les positions de la lettre dans le mot
            $indexMot = array();
            
            for ($i=0; $i < strlen($mot); $i++) { 
                if (substr(strtolower($_SESSION["mot"]), $i, 1) == strtolower($lettre)) {
                    array_push($indexMot, $i);
                }
            }

            //si la lettre n'est pas trouvé, on gére le nombre d'erreur faite et l'image a afficher
            if(count($indexMot) == 0){
                $_SESSION['erreur'] = $_SESSION['erreur'] + 1;

                switch ($_SESSION['erreur']) {
                    case 0:
                        $_SESSION['img'] = "asset/images/Hangman-0.png";
                        break;
                    case 1:
                        $_SESSION['img'] = "asset/images/Hangman-1.png";
                        break;
                    case 2:
                        $_SESSION['img'] = "asset/images/Hangman-2.png";
                        break;
                    case 3:
                        $_SESSION['img'] = "asset/images/Hangman-3.png";
                        break;
                    case 4:
                        $_SESSION['img'] = "asset/images/Hangman-4.png";
                        break;
                    case 5:
                        $_SESSION['img'] = "asset/images/Hangman-5.png";
                        break;
                    case 6:
                        $_SESSION['img'] = "asset/images/Hangman-6.png";
                        $_SESSION['message'] = "Vous avez perdu !";
                        
                        break;
                    default:
                    $_SESSION['img'] = "asset/images/Hangman-6.png";
                }


                
            }else{
                //on récupère le mot caché pour pouvoir remplacer les _ par la lettre trouvé
                $motPendu = $_SESSION["motPendu"];
                $nbLettreTrouve = $_SESSION["trouve"] + count($indexMot);
                $_SESSION["trouve"] = $nbLettreTrouve;

                //on remplace les _ par la lettre
                for ($u=0; $u < count($indexMot); $u++) { 
                    $motPendu[$indexMot[$u]] = $_GET['lettre'];
                }
                //si on a trouvé toutes les lettres, on affiche le message
                if($nbLettreTrouve == strlen ($_SESSION["mot"])){
                    $_SESSION['message'] = "Bien joué ! Vous avez trouvé !";
                }
                $_SESSION["motPendu"] = $motPendu;

                //on réinitialise la variable td pour affiche le nouvelle état du mot caché
                $td = "";
                for ($index=0; $index < strlen ($_SESSION["mot"]); $index++) {
                    
                    $td = $td . "<td id='". $index ."'>". $motPendu[$index] ."</td>";
                }
                $_SESSION["td"] = $td;
            }

        }
    }

    $view = "view/v_partie.php";
?>