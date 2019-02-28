<?php
session_start();

$_SESSION['num']+=100;

echo $_SESSION['num'];
echo $_SESSION['name'];
?>