<?php
session_start();

$_SESSION['num']=100;
$_SESSION['name']='kodama';

echo $_SESSION['num'];
echo $_SESSION['name'];
?>