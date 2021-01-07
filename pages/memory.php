<?php
require_once('../classes/database.php');
$_GET['nbcards'] = 10;
$nbcards = $_GET['nbcards'];
$pdo = new database();

$pairs1 = $pdo->Select("SELECT * FROM cards  ORDER BY RAND() LIMIT $nbcards");
$pairs2 = $pairs1;
$deck = array_merge($pairs1, $pairs2);
shuffle($deck);

if (isset($_POST['submit'])) {
    echo "yo";
}
?>

<?php include '../includes/header.php'; ?>

<body>
<div class="container">
    <?php
    echo "<table>";
    $i = 1;
    echo "<tr>";

    foreach ($deck as $card) {
        echo "<td>";
        if ($card['status'] == 'closed') {
            echo "<form method='post'><button type='submit' name='submit'><img class='imgcard responsive-image' src='../src/back.png'></button></form>";
        } elseif ($card['status'] == 'opened') {
            echo "<img class='imgcard' src=" . $card['img_url'] . ">";
        } elseif ($card['status'] == 'found') {
            echo "<img class='imgcard' class='imgtrouvee' src=" . $card['img_url'] . ">";
        }
        echo "</td>";
        $i++;

        if ($i > 5) {
            echo "</tr><tr>";
            $i = 1;
        }
    }

    echo "</tr></table>";
    ?>
</div>

<?php include '../includes/footer.php'; ?>