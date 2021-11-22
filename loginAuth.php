<?php
################################################################################################
//File: loginAuth.php
//Filetype: PHP
//Author: Chris Silva 
//Created: 08/27/21
################################################################################################
// Only if session is started (User has provided valid login credentials) may User move onto experiment page
session_start();

if(empty($_SESSION["authenticated"]) || $_SESSION["authenticated"] != 'true') {
    header('Location: login.php'); 
};
?>