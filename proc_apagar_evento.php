<?php
include 'protect.php';
include_once 'config.php';
//$id = $_GET['id'];
$id = filter_input (INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
    $sql = "DELETE FROM eventos WHERE id='$id'";
    $conn->query($sql);
    $conn->close();
    $_SESSION['mensagem'] = '<div class="alert alert-success"> "Evento excluido" </div>';
    header("Location: agenda.php");
}else{
    $conn->close();
        $_SESSION['mensagem'] = '<div class="alert alert-danger"> "Evento não excluido" </div>';
};

