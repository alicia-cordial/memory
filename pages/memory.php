<?php
$titre = 'memory';
require_once('../classes/board.php');
$game = new board();
session_start();
$nbcards = $_SESSION['level'];
//$nbcards = 3;
//session_destroy();

if (!isset($_SESSION['nbcoups'])) {
    $_SESSION['nbcoups'] = 0;
}

if (!isset($_SESSION['foundpairs'])) {
    $_SESSION['foundpairs'] = 0;
}


if (!isset($_SESSION['gamestarted'])) {
    $_SESSION['deck'] = $game->createGame($nbcards);
    $_SESSION['gamestarted'] = true;
}

if (isset($_POST['carte'])) {
    $_SESSION['deck'][$_POST['carte']]['status'] = 'opened';


    if (!isset($_SESSION['firstcard'])) {
        $_SESSION['firstcard'] = $_SESSION['deck'][$_POST['carte']];
        $_SESSION['firstcard']['idDeck'] = $_POST['carte'];
    } else {
        $_SESSION['secondcard'] = $_SESSION['deck'][$_POST['carte']];
        $_SESSION['secondcard']['idDeck'] = $_POST['carte'];

    }
    $_SESSION['nbcoups']++;


    if (isset($_SESSION['secondcard'])) {
        $id1 = $_SESSION['firstcard']['idDeck'];
        $id2 = $_SESSION['secondcard']['idDeck'];

        if ($_SESSION['secondcard']['id'] == $_SESSION['firstcard']['id']) {
            echo 'yes';
            $_SESSION['deck'][$id1]['status'] = 'found';
            $_SESSION['deck'][$id2]['status'] = 'found';
            $_SESSION['foundpairs']++;
        } else {
            echo 'no';
            $_SESSION['deck'][$id1]['status'] = 'closed';
            $_SESSION['deck'][$id2]['status'] = 'closed';
        }
        unset($_SESSION['firstcard']);
        unset($_SESSION['secondcard']);

    }
  if ($_SESSION['foundpairs'] == $nbcards) {
        echo 'vous avez gagné!';
        session_destroy();
    }
}


?>
<html lang="en">
<?php include '../includes/header.php'; ?>

<body>
<main>
    <div class="container">
        <?php
        echo "<table>";
        $i = 1; //compteur cellules pour ligne

        echo "<tr>";
        for ($j = 0; $j < count($_SESSION['deck']); $j++) {
            echo "<td>";
            if ($_SESSION['deck'][$j]['status'] == 'closed') {
                echo "<form method='post'><button type='input' name='carte' class='cardbutton' value=" . $j . "><img class='imgcard responsive-image' src='../src/back.png'></button></form>";
            } elseif ($_SESSION['deck'][$j]['status'] == 'opened') {
                echo "<img class='imgcard' src=" . $_SESSION['deck'][$j]['img_url'] . ">";
            } elseif ($_SESSION['deck'][$j]['status'] == 'found') {
                echo "<img class='imgcard imgfound' src=" . $_SESSION['deck'][$j]['img_url'] . ">";
            }
            echo "</td>";
            $i++;

            if ($i > 5) {
                echo "</tr><tr>";
                $i = 1;
            }
        }


        echo "</tr></table>";
        if (isset($_SESSION['nbcoups'])) {
            echo $_SESSION['nbcoups'];
        }
        ?>
    </div>
</main>


<?php include '../includes/footer.php'; ?>

</body>

</html>


