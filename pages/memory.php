<?php
$titre = 'memory';
require_once ('../classes/board.php');
$game = new board();
session_start();
//$nbcards = $_SESSION['level'];
$nbcards = 3;
//session_destroy();

if (!isset($_SESSION['nbcoups'])) {
    $_SESSION['nbcoups'] = 0;
}
if (!isset($_SESSION['gamestarted'])) {
    $_SESSION['deck'] = $game->createGame($nbcards);
    $_SESSION['gamestarted'] = true;
}

if (isset($_POST['carte'])) {
    $_SESSION['deck'][$_POST['carte']]['status'] = 'opened';

    if (!isset($_SESSION['firstcard'])) {
        $_SESSION['firstcard'] = $_SESSION['deck'][$_POST['carte']];
    } else {
        $_SESSION['secondcard'] = $_SESSION['deck'][$_POST['carte']];
    }
    $_SESSION['nbcoups']++;

    if (isset($_SESSION['secondcard'])) {
        var_dump($_SESSION['secondcard']);
        var_dump($_SESSION['firstcard']);

        if ($_SESSION['secondcard']['id'] == $_SESSION['firstcard']['id']) {
            echo 'yes';
        } else {echo 'no';
            $_SESSION['deck'][$_POST['carte']] = 'closed';
        }
        $_SESSION['firstcard'] = null;
        $_SESSION['secondcard'] = null;
    }
}

/* if ($_SESSION['firstcard']['id'] == $_SESSION['deck'][$_POST['carte']]['id']) {

           $_SESSION['deck'][$_POST['carte']]['status'] = 'found';
           $_SESSION['deck']['firstcard']['status'] = 'opened';
if ($_SESSION['firstcard']['id'] == $_SESSION['deck'][$_POST['carte']]['id']) {
            echo 'yes';
            $_SESSION['firstcard'] = null;
        } else {
            echo 'no';
        }
       }*/

?>

<?php include '../includes/header.php'; ?>

<body>
<main>
    <div class="container">
        <?php
        echo "<table>";
        $i = 1; //compteur cellules pour ligne

        echo "<tr>";
        for($j= 0; $j < count($_SESSION['deck']); $j++) {
            echo "<td>";
<<<<<<< Updated upstream
            if ($_SESSION['deck'][$j]['status'] == 'closed') {
                echo "<form method='post'><button type='input' name='carte' class='cardbutton' value=".$j."><img class='imgcard responsive-image' src='../src/back.png'></button></form>";
            } elseif ($_SESSION['deck'][$j]['status'] == 'opened') {
                echo "<img class='imgcard' src=" . $_SESSION['deck'][$j]['img_url'] . ">";
            } elseif ($_SESSION['deck'][$j]['status'] == 'found') {
                echo "<img class='imgcard' class='imgtrouvee' src=" . $_SESSION['deck'][$j]['img_url'] . ">";
=======
            if(!isset($deck[$j]['status'])) {
                $deck[$j]['status'] = 'closed';
                }
            if ($deck[$j]['status'] == 'closed') {
                echo "<form method='post'><button type='input' name='carte' value=".$j."><img class='imgcard responsive-image' src='../src/back.png'></button></form>";
            } elseif ($deck[$j]['status'] == 'opened') {
                echo "<form method='post'><button type='input' class='disabled' name='carte' value=".$j."><img class='imgcard' src=" . $deck[$j]['img_url'] . "></button></form>";
            } elseif ($deck[$j]['status'] == 'found') {
                echo "<img class='imgcard' class='imgtrouvee' src=" . $deck[$j]['img_url'] . ">";
>>>>>>> Stashed changes
            }
            echo "</td>";
            $i++;

            if ($i > 5) {
                echo "</tr><tr>";
                $i = 1;
            }
        }


        echo "</tr></table>";
        echo $_SESSION['nbcoups'];
        ?>
    </div>
</main>



<?php include '../includes/footer.php'; ?>

</body>

</html>


