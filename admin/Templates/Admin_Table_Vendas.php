<table id="admin_table_vendas">
    <thead>
        <tr>
            <th class="table_col_2vw">     Nº          </th>
            <th class="table_col_2vw">     NV          </th>      
            <th class="table_col_6vw">     Dia         </th>
            <th class="table_col_4vw">     Hora        </th>
            <th class="table_col_2vw">     Id          </th>
            <th class="table_col_18vw">    Nome        </th>
            <th class="table_col_4vw">     Liquido     </th>
            <th class="table_col_14vw">    Preferenciao</th>
            <th class="table_col_4vw">     Valor.S     </th>
            <th class="table_col_10vw">    Acrescimo   </th>
            <th class="table_col_4vw">     V.Acres.    </th>
            <th class="table_col_6vw">     VT.Suco     </th>
        </tr>
    </thead>
    <tbody>
        <?php
            include_once('../config.php');

            $sql_2 = "SELECT * FROM admin_vendas_uni ";
            $result_2 = $conexao->query($sql_2);

            $soma_itens = 0;
            while($user_data = mysqli_fetch_assoc($result_2)) {
                $soma_itens += 1;

                $vd = $user_data['id_venda_uni'];

                if($vd % 2 == 0 ){

                
                echo "<tr class='table_col_cor'>";     
                    echo "<td class='table_col_2vw'>".$soma_itens."</td>";
                    echo "<td class='table_col_2vw'>".$user_data['id_venda_uni']."</td>";
                    echo "<td class='table_col_6vw'>".$user_data['dia']."</td>";
                    echo "<td class='table_col_4vw'>".$user_data['hora']."</td>";
                    echo "<td class='table_col_2vw'>".$user_data['id_fk']."</td>";
                    echo "<td class='table_col_18vw'>".$user_data['nome']."</td>";
                    echo "<td class='table_col_4vw'>".$user_data['liquido']."</td>";
                    echo "<td class='table_col_14vw'>".$user_data['preferencia']."</td>";
                    echo "<td class='table_col_4vw'>".$user_data['valor']."</td>";
                    echo "<td class='table_col_10vw'>".$user_data['acrescimo']."</td>";
                    echo "<td class='table_col_4vw'>".$user_data['valor_acrescimo']."</td>";
                    $v_1 = $user_data['valor'];
                    $v_2 = $user_data['valor_acrescimo'];

                    $v_1 = number_format($v_1, 2, '.','');
                    $v_2 = number_format($v_2, 2, '.','');

                    $vt_suco = $v_1 + $v_2;

                    echo "<td class='table_col_6vw'>".$vt_suco."</td>";

                echo "</tr>";
            }
            else {
                echo "<tr>";     
                echo "<td class='table_col_2vw'>".$soma_itens."</td>";
                echo "<td class='table_col_2vw'>".$user_data['id_venda_uni']."</td>";
                echo "<td class='table_col_6vw'>".$user_data['dia']."</td>";
                echo "<td class='table_col_4vw'>".$user_data['hora']."</td>";
                echo "<td class='table_col_2vw'>".$user_data['id_fk']."</td>";
                echo "<td class='table_col_18vw'>".$user_data['nome']."</td>";
                echo "<td class='table_col_4vw'>".$user_data['liquido']."</td>";
                echo "<td class='table_col_14vw'>".$user_data['preferencia']."</td>";
                echo "<td class='table_col_4vw'>".$user_data['valor']."</td>";
                echo "<td class='table_col_10vw'>".$user_data['acrescimo']."</td>";
                echo "<td class='table_col_4vw'>".$user_data['valor_acrescimo']."</td>";
                $v_1 = $user_data['valor'];
                $v_2 = $user_data['valor_acrescimo'];

                $v_1 = number_format($v_1, 2, '.','');
                $v_2 = number_format($v_2, 2, '.','');

                $vt_suco = $v_1 + $v_2;

                echo "<td class='table_col_6vw'>".$vt_suco."</td>";

            echo "</tr>";
            }
        }
            ?>
    </tbody>
</table>
