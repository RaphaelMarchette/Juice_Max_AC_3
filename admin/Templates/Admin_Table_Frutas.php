<table id="admin_table_frutas">
    <thead>
        <tr>
            <th class="table_col_6vw">     Id          </th>
            <th class="table_col_18vw">     Nome          </th>      
            <th class="table_col_18vw">     Kg.         </th>
            <th class="table_col_18vw">     Valor         </th>    
        </tr>
    </thead>
    <tbody>
        <?php
            include_once('../config.php');

            $sql_2 = "SELECT * FROM select_frutas ";
            $result_2 = $conexao->query($sql_2);

            while($user_data = mysqli_fetch_assoc($result_2)) {
                echo "<tr>";     
                echo "<td class='table_col_6vw'>".$user_data['id']."</td>";
                echo "<td class='table_col_18vw'>".$user_data['nome']."</td>";
                echo "<td class='table_col_18vw'>".$user_data['valor']."</td>";
                echo "<td class='table_col_18vw'>".$user_data['estoque']."</td>";
                echo "</tr>";
        }
            ?>
    </tbody>
</table>
