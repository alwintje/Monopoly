<?php

// var_dump($_GET);

//echo $_GET['array'];
$a = explode(",", $_GET['place']);
$token = explode(",", $_GET['token']);
        require("places.php");

        echo '
            <script>';
        foreach($a as $key => $value){
            if($key != 0){
                $plek = place($value,1);
                echo '
                    $( "#pion'.$key.'" ).css({'.$plek.'});';
            }
        }
        echo '
            </script>';
                            
?>