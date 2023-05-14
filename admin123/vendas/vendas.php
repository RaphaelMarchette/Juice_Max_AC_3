<?php
    include_once('../../config.php');

    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT * FROM admin_vendas_uni WHERE id LIKE '%$data%' or nome LIKE '%$data%' ORDER BY id ";

    }
    else
    {
        $sql = "SELECT * FROM admin_vendas_uni ";
    }

    $result = $conexao->query($sql);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Juice Max | Entrada de Estoque</title>
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
        }

        .table-bg{
            background: rgba(0, 0, 0, 0.3);
            border-radius: 15px 15px 0 0;
            width: 28vw;
            position:absolute;
            top:4vh;
            left: 4vw;
        }

        .box-search{
            display: flex;
            gap: .1%;
            position:absolute;
            bottom:2rem;
            left:6vw;
            width: 90vw;
        }


        #id_novo_suco,#id_voltar{
            text-decoration: none;
            color: white;
            border: 3px solid dodgerblue;
            border-radius: 10px;
            padding: 10px;
            position:absolute;
            bottom:2rem;
            right:2rem;
            width: 10rem;
            font-size: 1rem;
            text-align: center;
        }

        #id_novo_suco,#id_voltar:hover{
            background-color: dodgerblue;
        }

        #id_novo_suco{
            top:2rem;
            height:3rem;
        }

    </style>

    
</head>
<body>

    <div class="box-search">
        <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>


    <div class="m-5">
        <table class="table text-white table-bg table-bg-1">
            <thead>
                <tr>
                    <th scope="col">nº</th>
                    <th scope="col">Dia</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Valor</th>
                    <th scope="col">...</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($user_data = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>".$user_data['id_venda_uni']."</td>";
                            echo "<td>".$user_data['dia']."</td>";
                            echo "<td>".$user_data['hora']."</td>";
                            echo "<td>".$user_data['valor']."</td>";
                            echo "<td>
                            <a class='btn btn-sm btn-primary' href='edit.php?id=$user_data[id]' title='Editar'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                </svg>
                                </a> 
                                </td>";
                            echo "</tr>";
                    }
                    ?>
            </tbody>
        </table>
    </div>

    <a href="new.php" id="id_novo_suco">Novo Suco</a>

    <a href="../admin.php" id="id_voltar">Voltar</a>

</body>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'enter.php?search='+search.value;
    };
</script>

<script>
    document.addEventListener('keydown', function(e) {
        if(e.keyCode == 17){  //  Tecla Ctrl
        document.getElementById("id_voltar").click();
        }
    });
</script>

</html>


