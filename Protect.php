<?php

if(!isset($_SESSION)){
    session_start();
}
if(!isset($_SESSION['id'])){
    header("Location: login.html");
die("Você não pode acessar esta página, efetue o login para acessar");

}
?>