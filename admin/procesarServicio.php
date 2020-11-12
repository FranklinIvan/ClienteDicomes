<?php 
    require('conexionDB.php');

    if(isset($_POST['btnEnviar'])){
        try {
            $sql = "INSERT INTO servicio (fecha,
                                        ubicacion,
                                        hora_inicio, 
                                        hora_final, 
                                        tipo_servicio, 
                                        tipo_evento, 
                                        cantidad_personas, 
                                        titulo, 
                                        descripcion)
                                VALUES (:fecha,
                                        :ubicacion,
                                        :hora_inicio, 
                                        :hora_final, 
                                        :tipo_servicio, 
                                        :tipo_evento, 
                                        :cantidad_personas, 
                                        :titulo, 
                                        :descripcion)";

            $stmt = $conex->prepare($sql);
            $stmt->bindParam(':fecha',$_POST['fecha']);
            $stmt->bindParam(':ubicacion',$_POST['ubicacion']);
            $stmt->bindParam(':hora_inicio',$_POST['horaInicio']);
            $stmt->bindParam(':hora_final',$_POST['horaFinal']);
            $stmt->bindParam(':tipo_servicio',$_POST['tipoServicio']);
            $stmt->bindParam(':tipo_evento',$_POST['tipoEvento']);
            $stmt->bindParam(':cantidad_personas',$_POST['cantidadPersonas']);
            $stmt->bindParam(':titulo',$_POST['titulo']);
            $stmt->bindParam(':descripcion',$_POST['descripcion']);

            if($stmt->execute() == true){
                header("location: ../views/bienvenido.php?solicitudEnviada");
                exit;
            }else{
                header("location: ../views/bienvenido.php?error");
                exit;
            }
        } catch (PDOException $e) {
            echo $e;
        }
    }


    
?>