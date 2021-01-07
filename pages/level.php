<?php

require_once '../classes/user.php';

require_once '../classes/card.php';




if(isset($_POST['valider'])){


    header('Location:memory.php');
}

?>




<?php include '../includes/header.php'; ?>

<main class="main_lvl">

    
    <div class="go_back_button">
        <!--<a href="index.php"></a>-->

    </div>

    <div class="frame">

        <h1>Choix de la difficulté</h1>

        <form action="" method="post">
        <select name="nb_paires">

        <?php for($i=3; $i<=12; ++$i):?>
            <option value=<?= $i ?> ><?= $i ?> paires</option>
        <?php endfor ?>

        </select>

        <button type="submit" name="valider">Valider</button>

        </form>



    </div>
    

</main>


<?php include '../includes/footer.php'; ?>

<!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
<script>
    $(document).ready(function () {
        $('.sidenav').sidenav();
    });
</script>
</body>
</html>