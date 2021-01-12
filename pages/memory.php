<?php
$titre = 'Memory';
require_once('../classes/board.php');
session_start();
$nbcards = $_SESSION['level'];
//session_destroy();
//$nbcards = 3;
//var_dump($_SESSION);

//Initialisation partie
if (!isset($_SESSION['gamestarted'])) {
    $_SESSION['game'] = new board();
    $_SESSION['deck'] = $_SESSION['game']->createGame($nbcards); //génère jeu de cartes
    $_SESSION['gamestarted'] = true;
}

//Partie en cours
if (isset($_POST['carte'])) {
    $_SESSION['game']->addCoup(); //compte un coups

    $selectCard = $_POST['carte'];
    $_SESSION['deck'][$selectCard]->setStatus('open'); //retourne la carte

    if (!isset($_SESSION['card1'])) { //stocke valeur premiere carte
        $_SESSION['card1'] = $selectCard;
    } elseif (!isset($_SESSION['card2'])) { //stocke valeur seconde carte
        $_SESSION['card2'] = $selectCard;
    } else {
        //Si bonne paire, grise la carte
        if ($_SESSION['deck'][$_SESSION['card1']]->getId() === $_SESSION['deck'][$_SESSION['card2']]->getId()) {
            $_SESSION['deck'][$_SESSION['card1']]->setStatus('found');
            $_SESSION['deck'][$_SESSION['card2']]->setStatus('found');
            $_SESSION['game']->AddPairsFound();
            //Si mauvaise paire, face cachée
        } else {
            $_SESSION['deck'][$_SESSION['card1']]->setStatus('closed');
            $_SESSION['deck'][$_SESSION['card2']]->setStatus('closed');
        } //réinitialise valeurs cartes 1 et 2
        unset($_SESSION['card1']);
        unset($_SESSION['card2']);
        $_SESSION['card1'] = $selectCard; //stocke valeur carte actuelle
    }

    //Fin de partie
    if (($_SESSION['game']->getPairsFound() == $nbcards) and (isset($_SESSION['card1'])) and (isset($_SESSION['card2']))) {
        $_SESSION['deck'][$_SESSION['card1']]->setStatus('found');
        $_SESSION['deck'][$_POST['carte']]->setStatus('found');
        $success = "Vous avez gagné !";
    }
}

?>
<html lang="en">
<?php include '../includes/header.php'; ?>

<body>
<main>
    <div class="container">
        <div>
                <p>Nombre de coups : <?php echo $_SESSION['game']->getCoups(); ?></p>
            <?php if (isset($success)): ?>
                <p><?php echo $success;?></p>
            <a href="restart.php">Refaire une partie</a>
            <?php endif; ?>
        </div>

        <table>
        <?php
        $i = 1;
        echo "<tr>";

        foreach ($_SESSION['deck'] as $card) { //génération cartes dans les cellules
            echo "<td>";
            if ($card->getStatus() == 'closed') {
                echo "<form method='post' action='memory.php'><button type='input' name='carte' class='cardbutton' value=" . $card->getPlace() . "><img class='imgcard responsive-image' src='../src/back.png'></button></form>";
            } elseif ($card->getStatus() == 'open') {
                echo "<img class='imgcard' src=" . $card->getUrl() . ">";
            } elseif ($card->getStatus() == 'found') {
                echo "<img class='imgcard imgfound' src=" .$card->getUrl() . ">";
            }
            echo "</td>";
            $i++;

            if ($i > 5) { // génération row de 5 cartes
                echo "</tr><tr>";
                $i = 1;
            }
        }

        echo "</tr>";
        ?>
        </table>
    </div>


</main>

<?php include '../includes/footer.php'; ?>

</body>

</html>


