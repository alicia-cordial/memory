<?php
$titre = 'profil';
require_once '../classes/score.php';
require_once '../classes/user.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location: connexion.php');
}

$score = new score();
$score->setId($_SESSION['user']->getId()); // envoi de l'id utilisateur à la classe score

$pairsmin = 3; //pour générer les boutons
$pairsmax = 12;


if (isset($_POST['submit'])) {
    $level = $_POST['submit']; //niveau sélectionné dans formulaire
    $historic = $score->lastGames(); //récup historique général
    $moves = $score->scoreUserMoves($level); //récup top du niveau par coups
    $times = $score->scoreUserTime($level);//récup top du niveau par temps
    $twoTables = ['coups' => $moves, 'temps' => $times]; //aggrégation des résultats dans un tableau
}

?>


<html lang="en">
<?php include '../includes/header.php'; ?>

<main class="center mainSpace">

    <!--if 1 - Affichage des boutons de niveaux-->
    <?php if (!isset($level))  : ?>
        <article class="container">
            <h3><em>Profil @<?php echo $_SESSION['user']->getLogin(); ?></em></h3>
            <a class="waves-effect waves-light white black-text btn-small" href="update.php">Modifier vos
                identifiants</a>
        </article>
        <article class="container">
            <h5 class="white-text center">Progression Personnelle</h5>
            <p class="grey-text"><em>Veuillez sélectionner un nombre de paires</em></p>
            <form action="profil.php" method="post" class="row">
                <?php for ($i = $pairsmin; $i <= $pairsmax; $i++) : ?>
                    <div class='col'>
                        <button class='black white-text btn-large buttonlevel' type='submit' name='submit'
                                value='<?php echo $i; ?>'><?php echo $i; ?></button>
                    </div>
                <?php endfor; ?>
            </form>
        </article>


        <!--if 1 - Affichage scores si niveau sélectionné-->
    <?php else : ?>
        <!--if 2 - Si l'utilisateur n'a jamais joué-->
        <?php if (empty($historic)) : ?>
            <section class="container">
                <p class="white-text">Vous n'avez jamais tiré les cartes de votre vie.</p>
                <a href="level.php" class="btn grey white-text">Changer le destin</a>
            </section>

            <!--if 2 - Si l'utilisateur a déjà joué-->
        <?php else: ?>
            <article class="container">
            <h3 class='white-text center'>Niveau : <?php echo $level; ?> </h3>
            <section class="sectionProfil">

            <!-- if 3 - Si niveau sélectionné n'a pas de score-->
            <?php if (empty($moves)) : ?>
                <div class="tablesProfil">
                    <p class="white-text">Vous n'avez jamais tiré ce nombre de paires.</p>
                    <a href="level.php" class="btn-small grey white-text">Changer le destin</a>
                </div>

                <!--if 3 - Si niveau sélectionné a des scores-->
            <?php else : ?>
                <!--affichage des 2 tableaux tops-->
                <div class="tablesProfil">
                    <?php foreach ($twoTables as $name => $oneTable) : ?>
                        <table class='centered tableFame'>
                            <h6><em>Meilleurs <?php echo $name; ?></em></h6>
                            <?php $i = 1; ?>
                            <?php foreach ($oneTable as $row) {
                                if ($i == 1) {
                                    echo "<thead>";
                                    foreach ($row as $key => $element) {
                                        echo "<th>" . $key . "</th>";
                                    }
                                    echo "</thead>";
                                    echo "<tbody>";
                                    $i = 0;
                                }
                                echo "<tr>";
                                foreach ($row as $cell) {
                                    echo "<td>" . $cell . "</td>";
                                }
                                echo "</tr>";
                            }
                            echo "</tbody>";
                            ?>
                        </table>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!--Affichage tableau historique-->
            <section class="sectionHistoric">
                <h5 class="center"><em>Historique général</em></h5>
                <p class="white-text">Vos derniers tirages</p>
                <table class='centered tableHistoric'>
                    <?php
                    $i = 1;
                    foreach ($historic as $row) {
                        if ($i == 1) {
                            echo "<thead>";
                            foreach ($row as $key => $element) {
                                echo "<th>" . $key . "</th>";
                            }
                            echo "</thead>";
                            echo "<tbody>";
                            $i = 0;
                        }
                        echo "<tr>";
                        foreach ($row as $cell) {
                            echo "<td>" . $cell . "</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    ?>
                </table>
            </section>
        <?php endif; ?>
        </section>
        </article>
    <?php endif; ?>
</main>

<?php include '../includes/footer.php'; ?>
</html>