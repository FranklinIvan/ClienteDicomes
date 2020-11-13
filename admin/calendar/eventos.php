<?php
    require('../conexionDB.php');

    header('Content-type: application/json');

    $sql = $conex->prepare("SELECT * FROM servicio");

    $sql->execute();
    $result = $sql->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);

    /* echo "holi";
    $sql = "SELECT id, fecha, ubicacion, hora_inicio, hora_final, tipo_servicio, tipo_evento, cantidad_personas, titulo, descripcion FROM servicio;";
    $stmt = $conex->prepare($sql);
    $stmt->execute();
    while($resultados = $stmt->fetch(PDO::FETCH_ASSOC)){
        echo var_dump($resultados) ['id'];
        echo $resultados['fecha'];
        echo $resultados['ubicacion'];
        echo $resultados['hora_inicio'];
        echo $resultados['hora_final'];
        echo $resultados['tipo_servicio'];
        echo $resultados['tipo_evento'];
        echo $resultados['cantidad_personas'];
        echo $resultados['titulo'];
        echo $resultados['descripcion'];
    } */
?>