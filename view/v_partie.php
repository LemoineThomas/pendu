<?php
    include('view/header.php');

    if(isset($_SESSION["img"])){
        echo '<div id="image">';
        echo    '<img src=' . $_SESSION["img"] . '>';
        echo '</div>';
    }

    if(isset($_SESSION["td"])){
        echo '<table id="mot" style="margin: auto;font-size: 25px;">';
        echo    '<tr id="mot-tr">';
        echo           $_SESSION["td"];
        echo    '</tr>';
        echo '</table>';

    }

    if(isset($_SESSION["message"])){

        echo "<div id='message'>" . $_SESSION["message"] . "</div>";
    }
?>

<table id="clavier">
    <tbody>
        <tr>
            <td id="Am" onclick="p('A')">A</td><td id="Bm" onclick="p('B')">B</td><td id="Cm" onclick="p('C')">C</td><td id="Dm" onclick="p('D')">D</td><td id="Em" onclick="p('E')">E</td>
            <td id="Fm" onclick="p('F')">F</td><td id="Gm" onclick="p('G')">G</td><td id="Hm" onclick="p('H')">H</td><td id="Im" onclick="p('I')">I</td><td id="Jm" onclick="p('J')">J</td>
            </tr>
            <tr>
            <td id="Km" onclick="p('K')">K</td><td id="Lm" onclick="p('L')">L</td><td id="Mm" onclick="p('M')">M</td><td id="Nm" onclick="p('N')">N</td><td id="Om" onclick="p('O')">O</td>
            <td id="Pm" onclick="p('P')">P</td><td id="Qm" onclick="p('Q')">Q</td><td id="Rm" onclick="p('R')">R</td><td id="Sm" onclick="p('S')">S</td><td id="Tm" onclick="p('T')">T</td>
            </tr>
            <tr>
            <td class="invisible"></td><td class="invisible"></td><td id="Um" onclick="p('U')">U</td><td id="Vm" onclick="p('V')">V</td><td id="Wm" onclick="p('W')">W</td>
            <td id="Xm" onclick="p('X')">X</td><td id="Ym" onclick="p('Y')">Y</td><td id="Zm" onclick="p('Z')">Z</td><td class="invisible"></td><td class="invisible"></td>
        </tr>
    </tbody>
</table>

<button class="btn btn-secondary" onclick="initPendu()">Lancer une nouvelle partie</button>

<?php
    include('view/footer.php');
?>