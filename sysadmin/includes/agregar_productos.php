<?php
    include("db.php");
    
    if (isset($_POST['habilitar'])){
        $habilitar=0;
    }else{
        $habilitar=1;
    }
    
    
    $titulo=$_POST['titulo'];
    $descripcion=$_POST['descripcion'];
    $precio=$_POST['precio'];
    $stock=$_POST['stock'];
    
    $categoria=$_POST['categoria'];
    
    $query = "INSERT INTO productos(titulo,detalle,precio,habilitar,stock,categoria) VALUES ('$titulo','$descripcion','$precio','$habilitar','$stock', '$categoria')";
    echo $query;
    $result = $conn->query($query);

    if($result){
        echo 'Se insertaron los datos';
    }else{
        echo 'no se inserto';
    } 
    header('Location:../productos.php');
?>