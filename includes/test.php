<?php 
include('db.php');
$query2 = "SELECT fecha_finalizado FROM pedidos WHERE  (estatus>5 && estatus<8)";
$result_pedidos1 = mysqli_query($conn, $query2);
while($row=mysqli_fetch_array($result_pedidos1)){
    echo $row['fecha_finalizado'];
    echo '<br>';
}