<?php 
    include("db.php");
    if(isset($_POST('AgregarDireccion'))){
        $alias=$_POST('alias');
        $cp=$_POST('cp');
        $colonia=$_POST('colonia');
        $municipio=$_POST('municipio');
        $exterior=$_POST('exterior');
        $interior=$_POST('interior');
        $refe=$_POST('refe');

        $query="INSERT INTO direcciones(alias, cp, colonia, municipio, exterior, interior, referencia, idusuario) VALUES 
        ('$alias','$cp','$colonia','$municipio','$exterior','$interior','$refe',";
        $result = mysqli_query($conn, $query);
    $filas = mysqli_num_rows($result);
    }
