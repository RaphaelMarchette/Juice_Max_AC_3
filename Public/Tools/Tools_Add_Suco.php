<?php
    if(!empty($_GET['id_Select']))
    {
        include_once('../../config.php');

        $table_Select = $_GET['table_Select'];

        $id_Select = $_GET['id_Select'];

        $table_Insert = $_GET['table_Insert'];

        $pre_id = 0;

        $sql_Select = "SELECT * FROM select_sucos WHERE id='$id_Select'";

        $result_Select = $conexao->query($sql_Select);

        if($result_Select->num_rows > 0)
        {
            while($user_data = mysqli_fetch_assoc($result_Select))
            {
                $nome = $user_data['nome'];
                $liquido_id_fk = $user_data['liquido_id_fk'];
                $liquido_peso_fk = $user_data['liquido_peso'];

                $fruta_1_id_fk = $user_data['fruta_1'];
                $fruta_2_id_fk = $user_data['fruta_2'];
                $fruta_3_id_fk = $user_data['fruta_3'];
                $fruta_4_id_fk = $user_data['fruta_4'];
                $fruta_5_id_fk = $user_data['fruta_5'];

                $peso_1_id_fk = $user_data['peso_1'];
                $peso_2_id_fk = $user_data['peso_2'];
                $peso_3_id_fk = $user_data['peso_3'];
                $peso_4_id_fk = $user_data['peso_4'];
                $peso_5_id_fk = $user_data['peso_5'];

                $pre_id += 2;
            }


            $sql_Select_7 = "SELECT * FROM Select_frutas WHERE id='$liquido_id_fk' " ;

            $result_Select_7 = $conexao->query($sql_Select_7);
        
            if($result_Select_7->num_rows > 0)
                {
                    while($user_data_7 = mysqli_fetch_assoc($result_Select_7))
                    {
                        $fruta_nome_7 = $user_data_7['nome'];
                        $fruta_valor_7 = $user_data_7['valor'];
                    }
                }

                $sql_Select_8 = "SELECT * FROM select_pesos WHERE id='$liquido_peso_fk'";

                $result_Select_8 = $conexao->query($sql_Select_8);
        
                if($result_Select_8->num_rows > 0)
                {
                    while($user_data_8 = mysqli_fetch_assoc($result_Select_8))
                    {
                        $nome_peso_fk = $user_data_8['nome'];
                    }

                }


                $liquido_valor = $fruta_valor_7 * $nome_peso_fk;

                $liquido_valor = number_format($liquido_valor, 2, '.', '');




                $sql_Select_9 = "SELECT * FROM select_liquidos WHERE id_fk='$liquido_id_fk'";

                $result_Select_9 = $conexao->query($sql_Select_9);
        
                if($result_Select_9->num_rows > 0)
                {
                    while($user_data_9 = mysqli_fetch_assoc($result_Select_9))
                    {
                        $liquido_id = $user_data_9['id'];
                    }

                }





                $sql_Select_3 = "SELECT * FROM pre_suco WHERE id='1'";

                $result_Select_3 = $conexao->query($sql_Select_3);

                if($result_Select_3->num_rows > 0)
                {
                    $pre_id +=2;
                }
                else
                {
                    header('Location: ../Pedir.php');
                }

            $lista_id_frutas = array($fruta_1_id_fk, $fruta_2_id_fk, $fruta_3_id_fk, $fruta_4_id_fk, $fruta_5_id_fk);

            $tam_lista_id = 0;

            foreach ($lista_id_frutas as &$id_fruta_fk) {
                if(!empty($id_fruta_fk))
                {
                    $tam_lista_id += 1;
                }
            }

            $lista_peso_frutas= array($peso_1_id_fk, $peso_2_id_fk, $peso_3_id_fk, $peso_4_id_fk, $peso_5_id_fk);

            list($a[1], $a[2], $a[3], $a[4], $a[5]) = $lista_peso_frutas;
            
            $nome_completo = '';
            $valor_suco = 0;

            $i = 0;

            foreach ($lista_id_frutas as &$id_fruta_fk) {
                if(!empty($id_fruta_fk))
                {
                    $i += 1;

                    $sql_Select_5 = "SELECT * FROM select_frutas WHERE id='$id_fruta_fk' ";

                    $result_Select_5 = $conexao->query($sql_Select_5);
                
                    if($result_Select_5->num_rows > 0)
                        {
                            while($user_data_5 = mysqli_fetch_assoc($result_Select_5))
                            {
                                $fruta_nome = $user_data_5['nome'];
                                $fruta_valor = $user_data_5['valor'];
                            }
                        }

                    $sql_Select_6 = "SELECT * FROM select_pesos WHERE id='$a[$i]' ";

                    $result_Select_6 = $conexao->query($sql_Select_6);
                
                    if($result_Select_6->num_rows > 0)
                        {
                            while($user_data_6 = mysqli_fetch_assoc($result_Select_6))
                            {
                                $peso_nome = $user_data_6['nome'];
                            }
                        }

                        $valor_suco_uni = ($fruta_valor * $peso_nome);

                        $valor_suco += $valor_suco_uni;

                        $valor_suco_uni = number_format($valor_suco_uni, 2, '.', '');
                        
                        $valor_suco = number_format($valor_suco, 2, '.', '');

                        echo "$fruta_nome = $valor_suco_uni<p>";
                }
            }
            

            if($liquido_id_fk == 51)
            {
                $liquido_valor = $valor_suco;
            }

            if($pre_id == 2)
            {
                $sql_Insert = "INSERT INTO $table_Insert (id, id_fk, nome, valor, liquido_peso) VALUES ('1', '$id_Select', '$nome', '$valor_suco','$liquido_peso_fk') ";
                $result_Insert = $conexao->query($sql_Insert);


            if($liquido_id_fk > 1 )
            {
                $sql_Insert = "INSERT INTO pre_liquido (id, id_fk, nome, valor) VALUES ('1', '$liquido_id_fk', '$fruta_nome_7', '$liquido_valor') ";
                $result_Insert = $conexao->query($sql_Insert);
                header('Location: ../Pedir.php');
            }

            }
            else
            {
                header('Location: ../Pedir.php');
            }
        }

    }
    else
    {
        header('Location: ../Pedir.php');
    }
        
?>
