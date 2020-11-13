<?php 
    require('../conexionDB.php');

    if(isset($_POST['btnEnviar'])){
        try {
            $sql = "INSERT INTO servicio (start,
                                        ubicacion,
                                        hora_inicio, 
                                        hora_final, 
                                        tipo_servicio, 
                                        tipo_evento, 
                                        cantidad_personas, 
                                        title, 
                                        description)
                                VALUES (:start,
                                        :ubicacion,
                                        :hora_inicio, 
                                        :hora_final, 
                                        :tipo_servicio, 
                                        :tipo_evento, 
                                        :cantidad_personas, 
                                        :title, 
                                        :description)";

            $stmt = $conex->prepare($sql);
            $stmt->bindParam(':start',$_POST['fecha']);
            $stmt->bindParam(':ubicacion',$_POST['ubicacion']);
            $stmt->bindParam(':hora_inicio',$_POST['horaInicio']);
            $stmt->bindParam(':hora_final',$_POST['horaFinal']);
            $stmt->bindParam(':tipo_servicio',$_POST['tipoServicio']);
            $stmt->bindParam(':tipo_evento',$_POST['tipoEvento']);
            $stmt->bindParam(':cantidad_personas',$_POST['cantidadPersonas']);
            $stmt->bindParam(':title',$_POST['titulo']);
            $stmt->bindParam(':description',$_POST['descripcion']);

            if($stmt->execute() == true){
                header("location: ../../views/bienvenido.php?solicitudEnviada");
                exit;
            }else{
                header("location: ../../views/bienvenido.php?error");
                exit;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }
 
?>