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
            $apiURL ="http://localhost/PHP/API/tabla1.php";

            $curl = curl_init();
    
            curl_setopt($curl, CURLOPT_URL, $apiURL);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $res = curl_exec($curl);
            curl_close($curl);
            $datos = json_decode(json: $res);
            foreach($datos as $campo => $nose){
                echo "$campo => $nose";
            }
        }
    ?>
</body>
</html>