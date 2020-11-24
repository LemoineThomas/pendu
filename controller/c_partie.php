<?php
    if ($_GET['partie'] == 'nouvelle') {
        $_SESSION["erreur"] = '0';
        $_SESSION["img"] = "asset/images/Hangman-0.png";

	    $dictionnaire = file_get_contents("dictionnaire.json");
        $json_a = json_decode($dictionnaire, true);

        $motNum = array_rand($json_a['dictionnaire'], 1);

        $_SESSION["mot"] = $json_a['dictionnaire'][$motNum];

        $td= "";
        $motPendu = array();
        for ($index=0; $index < strlen ($json_a['dictionnaire'][$motNum]); $index++) {
            array_push($motPendu, "_");
            $td = $td . "<td id='". $index ."'>". $motPendu[$index] ."</td>";
        }

        $_SESSION["motPendu"] = $motPendu; 
        $_SESSION["td"] = $td;

    }else if($_GET['partie'] == 'proposition'){
        if (isset($_GET['lettre'])) {

            $lettre = $_GET['lettre'];
            $mot = $_SESSION['mot'];
            $erreur = $_SESSION['erreur'];

            $indexMot = strpos(strtolower($mot),strtolower($lettre));

            if($indexMot === false){
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
                        
                        break;
                    default:
                    $_SESSION['img'] = "asset/images/Hangman-0.png";
                }

                $_SESSION['pos'] = $indexMot;
                
            }else{
                $_SESSION['pos'] = $indexMot;
                $motPendu = $_SESSION["motPendu"];
                $motPendu[$indexMot] = $_GET['lettre'];
                $_SESSION["motPendu"] = $motPendu;
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