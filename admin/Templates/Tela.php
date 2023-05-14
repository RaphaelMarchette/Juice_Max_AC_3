<?php
    session_start();
    include_once('../config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="Static_28/css/Tela.css"/>
    <link rel="stylesheet" href="Static_28/css/Table.css"/>
    <link rel="stylesheet" href="Static_28/css/Container.css" />
    <link rel="stylesheet" href="Static_28/css/1.css" />
    <script src="Static_28/Scripts/aba_nav.js" defer></script>

</body>
</html>


<script>
    document.addEventListener('keydown', function(e) {
    if(e.keyCode == 17){  //  Tecla Ctrl
    document.getElementById("bt_voltar").click();
    }
    });
</script>
