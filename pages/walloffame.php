<?php
$titre = 'wall of fame';
require_once '../classes/score.php';
session_start();
$score = new score();

$pairsmin = 3; //pour générer les boutons
$pairsmax = 12;

if (isset($_POST['submit'])) {
    $level = $_POST['submit']; //niveau sélectionné dans formulaire
    $moves = $score->scoreByMoves($level); //récup scores par coups
    $times = $score->scoreByTime($level);//récup scores par temps
    $twoTables = ['coups' => $moves, 'temps' => $times]; //aggrégation des résultats dans un tableau
}
?>

<html lang="en">
<?php include '../includes/header.php'; ?>

<main id="main_fame" class="center mainSpace">
    <article>
        <h3 class="white-text center">Wall of Fame</h3>
        <p class="white-text center"><em>Les enfants de Dame Fortune</em></p>
    </article>

    <!--Affichage boutons sélection niveau-->
    <?php if (!isset($level))  : ?>
        <article class="container">
            <h5 class="white-text center"><em>Veuillez sélectionner un nombre de paires</em></h5>
            <form action="walloffame.php" method="post" class="row">
                <?php for ($i = $pairsmin; $i <= $pairsmax; $i++) : ?>
                    <div class='col'>
                        <button class='black white-text btn-large buttonlevel' type='submit' name='submit'
                                value='<?php echo $i ?>'> <?php echo $i ?> </button>
                    </div>
                <?php endfor; ?>
            </form>
        </article>

        <!--Affichage scores si niveau sélectionné-->
    <?php else : ?>
        <article class="container">
            <h3 class='white-text center'>Niveau : <?php echo $level; ?> </h3>

            <!-- Si niveau sélectionné n'a pas de score-->
            <?php if (empty($moves)) : ?>
                <section>
                    <p class="white-text">Ce nombre de paires n'a jamais été tiré.</p>
                    <a href="level.php" class="btn-small grey white-text">Conjurer le sort</a>
                </section>

                <!--si niveau sélectionné a des scores-->
            <?php else : ?>
                <section class="sectionFame">
                    <?php foreach ($twoTables as $name => $oneTable) : ?>
                        <div class="divtableFame">
                            <table class='centered tableFame'>
                                <h6><em>Top 10 par <?php echo $name; ?></em></h6>
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
                        </div>
                    <?php endforeach; ?>
                </section>
            <?php endif; ?>

        </article>
    <?php endif; ?>

</main>

<?php include '../includes/footer.php'; ?>
</html>