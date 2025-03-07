<?php
    function bocataLomo(){
        $datos = [
            "bocata" => "ya",
            "albaricoque" => "nose",
            "melocoton" => "Almibar"
        ];

        return json_encode($datos);
    }

    echo bocataLomo();



?>