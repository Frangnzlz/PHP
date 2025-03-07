<?php
    require "../conexion.php";

    $method = $_GET["method"];
    error_reporting(E_ALL);
    ini_set("display_errors", 1);


    switch ($method){
        case "GET":
            echo casoGET($_conexion);
            break;
        case "POST":
            echo casoPOST($_conexion);
            break;
    }



    function casoGET($_conexion){
        if(isset($_GET["id_juego"])){
            $consulta = "SELECT * FROM Juegos WHERE id_juego = :id";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute([
                "id" => $_GET["id_juego"]
            ]);
            if($stmt -> rowCount() == 0){
                return json_encode([["Error" => "No has introducido un valor valido"]]);
            }else{
                $res = $stmt -> fetchAll(pdo::FETCH_ASSOC);
                return json_encode($res);
            }
        }else{
            $consulta = "SELECT * FROM juegos";
            $stmt = $_conexion -> prepare($consulta);
            $stmt -> execute();
            $res = $stmt -> fetchAll(pdo::FETCH_ASSOC);
            return json_encode($res);            
        }
    }

    function casoPOST($_conexion){
        if(!isset($_GET["nombre"]) && !isset($_GET["genero"]) && !isset($_GET["fecha_lanzamiento"]) && !isset($_GET["id_desarrollador"])){
            $result = ["ERROR" =>  "Faltan campos por rellenar"];
        }else{
            $nombre = $_GET["nombre"];
            $genero = $_GET["genero"];
            $fecha = $_GET["fecha_lanzamiento"];
            $id_desarrollador = $_GET["id_desarrollador"];
            $consulta = "INSERT INTO juegos 
            (nombre, genero, fecha_lanzamiento, id_desarrollador) VALUE
            :n, :g, :f, :d";
            $stmt = $_conexion -> prepare($consulta);
            $introducido = $stmt -> execute([
                "n" => $nombre,
                "g" => $genero, 
                "f" => $fecha,
                "d" => $id_desarrollador
            ]);
            if($introducido){
                $result = ["EXITO" =>  "Juego introducido"];
            }else{
                $result = ["ERROR" =>  "Algun campo no es correcto"];
            }

        }
        return json_encode($result);
    }
?>