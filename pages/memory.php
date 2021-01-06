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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <link rel="stylesheet" href="../css/style.css">
</head>
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

</body>

</html>