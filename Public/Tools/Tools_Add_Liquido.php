<?php
    if(!empty($_GET['id_Select']))
    {
        include_once('../../config.php');

        $sql_Select_1 = "SELECT * FROM pre_suco WHERE id=1";
        $result_Select_1 = $conexao->query($sql_Select_1);

        if($result_Select_1->num_rows > 0)
        {
            while($user_data_1 = mysqli_fetch_assoc($result_Select_1))
            {
                $suco_id_fk = $user_data_1['id_fk'];
                $valor_suco = $user_data_1['valor'];
                $peso_id_fk = $user_data_1['liquido_peso'];
            }

            $sql_Select_4 = "SELECT * FROM select_pesos WHERE id='$peso_id_fk'";

            $result_Select_4 = $conexao->query($sql_Select_4);
    
            if($result_Select_4->num_rows > 0)
            {
                while($user_data_4 = mysqli_fetch_assoc($result_Select_4))
                {
                    $nome_peso_fk = $user_data_4['nome'];
                }
            }

            $table_Select = $_GET['table_Select'];

            $id_Select = $_GET['id_Select'];

            $table_Insert = $_GET['table_Insert'];

            $sql_Select = "SELECT * FROM $table_Select WHERE id='$id_Select'";

            $result_Select = $conexao->query($sql_Select);

            if($result_Select->num_rows > 0)
            {
                while($user_data = mysqli_fetch_assoc($result_Select))
                {
                    $liquido_id_fk = $user_data['id_fk'];
                }

                $sql_Select_3 = "SELECT * FROM select_frutas WHERE id=$liquido_id_fk ";
                $result_Select_3 = $conexao->query($sql_Select_3);
        
                if($result_Select_3->num_rows > 0)
                {
                    while($user_data_3 = mysqli_fetch_assoc($result_Select_3))
                    {
                        $nome_fruta = $user_data_3['nome'];
                        $valor_fruta = $user_data_3['valor'];
                    }
                }



                $liquido_valor_res = $valor_fruta * $nome_peso_fk;

                $liquido_valor_res = number_format($liquido_valor_res, 2, '.', '');



                $sqlDelete = "DELETE FROM $table_Insert ";
                $resultDelete = $conexao->query($sqlDelete);

                $sql_Insert = "INSERT INTO $table_Insert (id, id_fk, nome, valor) VALUES ('1', '$id_Select', '$nome_fruta', '$liquido_valor_res') ";
                $result_Insert = $conexao->query($sql_Insert);
                ?>
                <div class="sucesso">E-mail enviado com sucesso!</div>
                <?php
                header('Location: ../Pedir.php');
            }
            else
            {
                header('Location: ../Pedir.php');
            }
        }
        else
        {
            header('Location: ../Pedir.php');
        }
    }
    else
    {
        header('Location: ../Pedir.php');
    }

?>


