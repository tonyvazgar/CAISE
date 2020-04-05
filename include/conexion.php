<?php
    $ipLocal="10.0.0.201."; //Esta es para el servidor de la fabrica
    // $ipLocal="10.0.0.198:9090";      // Esta es para mi ip en wampp
    $host="localhost";
    $db="almacen";
    $con=mysqli_connect($host,"root","");
    mysqli_set_charset($con, 'utf8');
    mysqli_select_db( $con, $db ) or die ( "Upps! Pues va a ser que no se ha podido conectar a la base de datos" );
    
?>
