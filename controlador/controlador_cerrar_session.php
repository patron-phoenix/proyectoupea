<?php

session_start();
session_destroy();
header("location:/proyectofinal/vista/login/login.php");
?>