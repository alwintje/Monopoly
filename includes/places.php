<?php

function place($p,$a){


    if($p < 11 AND $p > 2){
        $left = 1135;
        $top = 1000;
        for($i = 2;$p > $i;$i++){
            $left = $left-93;
        }
    }
    if($p < 21 AND $p > 12){
        $left = 280;
        $top = 910;
        for($i = 12;$p > $i;$i++){
            $top = $top-93;
        }
    }
    if($p < 31 AND $p > 22){
        $left = 390;
        $top = 60;
        for($i = 22;$p > $i;$i++){
            $left = $left+93;
        }
    }
    if($p < 41 AND $p > 32){
        $left = 1250;
        $top = 160;
        for($i = 32;$p > $i;$i++){
            $top = $top+93;
        }
    }
    
    
    
    
    if($p == 1){
        $left = 1250;
        $top = 1000;
    }
    if($p == 2){
        $left = 1135;
        $top = 1000;
    }
    if($p == 11){
        $left = 240;
        $top = 1060;
    }
    if($p == 12){
        $left = 280;
        $top = 910;
    }
    if($p == 21){
        $left = 280;
        $top = 60;
    }
    if($p == 22){
        $left = 390;
        $top = 60;
    }
    if($p == 31){
        $left = 1250;
        $top = 60;
    }
    if($p == 32){
        $left = 1250;
        $top = 160;
    }
    if($p == 41){
        $left = 300;
        $top = 990;
    }
    
    
    //'.$left.'
    //'.$top.'
    if($a == 1){
        $style = '"left":"'.$left.'px","top":"'.$top.'px"';
        //$style = "left":"px","top":"px";
    }else{
        $style = "left: ".$left."px;top: ".$top."px";
    }
    return $style;
}
function houses($p){

}

?>