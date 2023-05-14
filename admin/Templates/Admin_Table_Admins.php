<table id="admin_table_Admins">
    <thead>
        <tr>
            <th class="table_col_6vw">      Id          </th>
            <th class="table_col_18vw">     Nome          </th>      
            <th class="table_col_18vw">     Senha         </th> 
        </tr>
    </thead>
    <tbody>
        <?php
            include_once('../config.php');

            $sql_2 = "SELECT * FROM select_Admins ";
            $result_2 = $conexao->query($sql_2);

            while($user_data = mysqli_fetch_assoc($result_2)) {
                echo "<tr>";     
                echo "<td class='table_col_6vw'>".$user_data['id']."</td>";
                echo "<td class='table_col_18vw'>".$user_data['nome']."</td>";
                echo "<td class='table_col_18vw'>".$user_data['senha']."</td>";
                echo "</tr>";
        }
            ?>
    </tbody>
</table>
