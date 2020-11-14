<?php
    require('../conexionDB.php');
    header('Content-type: application/json');

    

    $sql = $conex->prepare("SELECT * FROM servicio");

    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

?>