<?php
session_start();
unset($_SESSION['deck']);
unset($_SESSION['game']);
unset($_SESSION['card1']);
unset($_SESSION['card2']);
unset($_SESSION['timeStart']);
unset($_SESSION['timeEnd']);
unset($_SESSION['level']);
unset($_SESSION['time']);
unset($_SESSION['success']);
unset($_SESSION['round']);
header('Location:level.php');