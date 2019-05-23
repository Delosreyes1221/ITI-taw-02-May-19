<html>
<h1 align="center">TABLA DE IMC</h1>

<table>
    <tr>
        <th>Edad</th>
        <th>Altura</th>
        <th>Peso</th>
        <th>IMC</th>
    </tr>

<?php
    include 'conexion.php';
    $sql = "SELECT * FROM imc";

    if (!$result = mysqli_query($config, $sql)){
        die('Error: '. mysqli_error($config));
    }
    else{
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                
                ?>

                <tr>
                    <td><?php echo $row['edad'];?></td>
                    <td><?php echo $row['altura'];?></td>
                    <td><?php echo $row['peso'];?></td>
                    <td><?php echo $row['imc'];?></td>
                </tr>


                <?php
            }
            
        }
        
    }
    ?>

</table>
</html>