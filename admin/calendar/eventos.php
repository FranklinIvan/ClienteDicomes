<?php
    require('../conexionDB.php');
    header('Content-type: application/json');

    $accion = (isset($_REQUEST['accion']))?$_GET['accion']:'leer';

    switch ($accion) {
        case 'agregar':
            // Instrucción para agregar servicio
            try {
                $sql = "INSERT INTO servicio (start,
                                            ubicacion,
                                            hora_inicio, 
                                            hora_final, 
                                            tipo_servicio, 
                                            tipo_evento, 
                                            cantidad_personas, 
                                            title, 
                                            descripcion,
                                            estado,
                                            eventColor,
                                            id_cliente)
                                    VALUES (:start,
                                            :ubicacion,
                                            :hora_inicio, 
                                            :hora_final, 
                                            :tipo_servicio, 
                                            :tipo_evento, 
                                            :cantidad_personas, 
                                            :title, 
                                            :descripcion,
                                            :estado,
                                            :eventColor,
                                            :id_cliente)";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':start',$_POST['fecha']);
                $stmt->bindParam(':ubicacion',$_POST['ubicacion']);
                $stmt->bindParam(':hora_inicio',$_POST['horaInicio']);
                $stmt->bindParam(':hora_final',$_POST['horaFinal']);
                $stmt->bindParam(':tipo_servicio',$_POST['tipoServicio']);
                $stmt->bindParam(':tipo_evento',$_POST['tipoEvento']);
                $stmt->bindParam(':cantidad_personas',$_POST['cantidadPersonas']);
                $stmt->bindParam(':title',$_POST['titulo']);
                $stmt->bindParam(':descripcion',$_POST['descripcion']);
                $estado = 'pendiente';
                $stmt->bindParam(':estado',$estado);
                $evetColor = 'lightslategray';
                $stmt->bindParam(':eventColor',$evetColor);
                $cliente = 1;
                $stmt->bindParam(':id_cliente',$cliente);
    
                if($stmt->execute() == true){
                    header("location: ../../views/bienvenido.php?solicitudEnviada");
                    exit;
                }else{
                    header("location: ../../views/bienvenido.php?error");
                    exit;
                }
            } catch (PDOException $e) {
                echo "Error al ingresar datos".$e;
            }
            break;

        case 'eliminar':
            // Intrucción para eliminar servicio
            echo "eliminar";
            try{
                $sql = "DELETE FROM servicio WHERE id =:id";
                $stmt = $conex->prepare($sql);
                $stmt->bindParam(':id',$_POST['idEliminar']);
                if($stmt->execute() == true){
                    header("location: ../../views/misSolicitudes.php?solicitudEliminada");
                    exit;
                }else{
                    header("location: ../../views/misSolicitudes.php?error");
                    exit;
                }
            }catch(PDOException $e){
                echo "Error al eliminar datos".$e;
            }
            break;
        
        default:
            $sql = $conex->prepare("SELECT * FROM servicio");
            $sql->execute();
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
            break;
    }

    

?>