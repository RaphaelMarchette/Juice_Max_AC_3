<?php
    session_start();
    include_once('../config.php');
    // print_r($_SESSION);
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="Static_20/css/Tela.css"/>
    <title>Juice Max | Pagamento</title>
</head>

<body>

    <div class="aba">
        <a class="navbar-brand" id="id_logado"><?php echo $logado;?></a>
        <a href="sair.php"  class="bt_voltar" id="bt_voltar">Sair</a>
        <a id="logo">Juice Max</a>
    </div>

    <div class="box_entrar"> 
        <a id="bt" href="user/autorizados.php">Admins Autorizados</a>
        <a id="bt" href="vendas/vendas.php">Vendas</a>
        <a id="bt" href="juice/enter.php">Entrada de Estoque</a>
    </div>

</body>

</html>