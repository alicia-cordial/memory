<?php
session_start();
unset($_SESSION['gamestarted']);
unset($_SESSION['deck']);
unset($_SESSION['game']);
unset($_SESSION['card1']);
unset($_SESSION['card2']);

header('Location:level.php');