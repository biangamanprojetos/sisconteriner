<?php
session_start();
unset($_SESSION["acessou"]);
header("location: index.html"); 
?>