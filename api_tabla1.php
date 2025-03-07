<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/api_tabla1.js"></script>
</head>
<body>
    <form action="" method="post" id="form">
        <select name="method" id="method">
            <option selected disabled> --SELECCIONA UN METODO</option>
            <option value="GET">GET(Recuperar datos)</option>
            <option value="POST">POST(Insertar datos)</option>
            <option value="PUT">PUT(Cambiar datos)</option>
            <option value="DELETE">DELETE(borrar datos)</option>
        </select>
    </form>

    <?php
        error_reporting(E_ALL);
        ini_set("display_errors", 1);
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $method = $_POST["method"];
            $apiURL ="http://localhost/PHP/API/tabla1.php?method=$method";
    
            if($method == "GET"){
                if($_POST["id_juego"] != ""){
                    $id = "&id_juego=$_POST[id_juego]";

                    $apiURL .= $id;
                }
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiURL);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($curl);
                curl_close($curl);
                $datos = json_decode($res, true);

                ?>
                <table border="1">
                    <tr>
                        <?php
                            foreach($datos[0] as $campo => $valor){?>
                                <th><?= $campo ?></th>
                        <?php };
                        ?>
                    </tr>
                    <?php
                        for($i = 0; $i < count($datos); $i++ ){
                            ?><tr><?php
                            foreach($datos[$i] as $campo => $valor){?>
                                <td><?= $valor ?></td>
                        <?php };
                        ?>
                        </tr>    
                    <?php }
                        ?>
                    </tr>
                </table>
                <?php
            }else if($method == "POST"){
                $nombre = $_POST["nombre"];
                $genero = $_POST["genero"];
                $fecha = $_POST["fecha_lanzamiento"];
                $id_desarrollador = $_POST["id_desarrollador"];
                $apiURL .=  "&nombre=$nombre&genero=$genero&fecha_lanzamiento=$fecha&id_desarrollador=$id_desarrollador";

                echo $apiURL;
                $curl = curl_init();
                curl_setopt($curl, CURLOPT_URL, $apiURL);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $res = curl_exec($curl);
                curl_close($curl);
                $datos = json_decode($res, true);
                var_dump($datos);
                foreach($datos as $valor => $texto){
                    echo "<h3>$valor : $text </h3>";
                }
            }
        }
    ?>
</body>
</html>