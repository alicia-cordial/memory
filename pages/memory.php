<?php
$titre = 'Memory';
require_once('../classes/board.php');
require_once('../classes/score.php');
require_once('../classes/user.php');
session_start();
if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
} elseif (!isset($_SESSION['level'])) {
    header('Location:level.php');
}

$myscore = new score();
$myscore->setId($_SESSION['user']->getId()); // envoi de l'id utilisateur à la classe score
$nbcards = $_SESSION['level']; //récupération nb cartes
if ($nbcards <= 6) { //définit un nb max de cartes par rangées
    $maxcells = 4;
} else {
    $maxcells = 5;
}

//Initialisation partie
if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = new board();
    $_SESSION['deck'] = $_SESSION['game']->createGame($nbcards); //génère jeu de cartes
}

//Partie en cours
if (isset($_POST['carte'])) {
    $_SESSION['game']->addCoup(); //compteur de coups

    if (empty($_SESSION['timeStart'])) {
        $_SESSION['timeStart'] = microtime(true); //set le timer
    }

    $selectCard = $_POST['carte'];
    $_SESSION['deck'][$selectCard]->setStatus('open'); //révèle la carte cliquée

    if (!isset($_SESSION['card1'])) { //stocke valeur premiere carte
        $_SESSION['card1'] = $selectCard;
    } elseif (!isset($_SESSION['card2'])) { //stocke valeur seconde carte
        $_SESSION['card2'] = $selectCard;
    } else { //lorsqu'on clique sur la troisième carte
        //Si bonne paire, grise
        if ($_SESSION['deck'][$_SESSION['card1']]->getId() === $_SESSION['deck'][$_SESSION['card2']]->getId()) {
            $_SESSION['deck'][$_SESSION['card1']]->setStatus('found');
            $_SESSION['deck'][$_SESSION['card2']]->setStatus('found');
            $_SESSION['game']->AddPairsFound();
            //Si mauvaise paire, retourne
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
        $_SESSION['success'] = "Félicitez-vous, vous avez gagné. Mais qu'avez-vous appris ?";
        $_SESSION['timeEnd'] = microtime(true); //arret timer
        $diff = $_SESSION['timeEnd'] - $_SESSION['timeStart'];
        $_SESSION['round'] = round($diff, 2);
        $_SESSION['time'] = gmdate('H:i:s', $_SESSION['round']);
        $myscore->insertScore($_SESSION['level'], $_SESSION['time'], $_SESSION['game']->getCoups()); //envoi du score
    }

}
?>

<html lang="en">
<?php include '../includes/header.php'; ?>

<main>
    <article class="container">
        <section class="center">
            <!--Fin de partie-->
            <?php if (isset($_SESSION['success'])): ?>
                <p class="white-text">Votre temps :
                    <?php
                    if ($_SESSION['round'] < 60) {
                        echo $_SESSION['round'] . ' secondes';
                    } else {
                        echo $_SESSION['time'] . ' minutes';
                    }
                    ?>
                </p>
                <p class="white-text">Votre nombre de coups : <?php echo $_SESSION['game']->getCoups(); ?></p>
                <p class="white-text"><?php echo $_SESSION['success']; ?></p>
                <a href="restart.php">Refaire un tirage</a>
                <!--Partie en cours-->
            <?php else : ?>
                <p class="white-text">Nombre de coups : <?php echo $_SESSION['game']->getCoups(); ?></p>
                <a href="restart.php">Faire table rase</a>
            <?php endif; ?>
        </section>

        <section id="containerMemory">
            <table id="tableMemory">
                <tbody>
                <tr>
                    <?php
                    $i = 1;
                    foreach ($_SESSION['deck'] as $card) { //génération cartes dans les cellules
                        echo "<td>" . $card->displayCards() . "</td>";
                        $i++;
                        if ($i > $maxcells) { // nouvelle row
                            echo "</tr><tr>";
                            $i = 1;
                        }
                    }
                    ?>
                </tr>
                </tbody>
            </table>
        </section>
    </article>

</main>

<?php include '../includes/footer.php'; ?>
</html>


