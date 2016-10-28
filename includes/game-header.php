<?php 


if(isset($_GET['start'])){
    $player = array();
    $token = array();
    $whois = array();
    
    
    if(isset($_GET['name1'])){
        $player[1] = $_GET['name1'];
        $token[1] = $_GET['token1'];
        $whois[1] = 1;
    }
    if(isset($_GET['name2'])){
        $player[2] = $_GET['name2'];
        $token[2] = $_GET['token2'];
        $whois[2] = 0;
    }
    if(isset($_GET['name3'])){
        $player[3] = $_GET['name3'];
        $token[3] = $_GET['token3'];
        $whois[3] = 0;
    }
    if(isset($_GET['name4'])){
        $player[4] = $_GET['name4'];
        $token[4] = $_GET['token4'];
        $whois[4] = 0;
    }
    if(isset($_GET['name5'])){
        $player[5] = $_GET['name5'];
        $token[5] = $_GET['token5'];
        $whois[5] = 0;
    }
    if(isset($_GET['name6'])){
        $player[6] = $_GET['name6'];
        $token[6] = $_GET['token6'];
        $whois[6] = 0;
    }
    $money = array("",150000,150000,150000,150000,150000,150000);
    $money = array("",5000,5000,5000,150000,150000,150000);
    $place = array("",1,1,1,1,1,1);// 40 plaatsen
    
    
    $chanceCards = range(1, 16);//array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
    $communCards = range(1, 16);
    shuffle($chanceCards);
    shuffle($communCards);
    $buyablePlaces = array(2,4,6,7,9,10,12,13,14,15,16,17,19,20,22,24,25,26,27,28,29,30,32,33,35,36,38,40);
}









?>




<!doctype html>
<html>
<head>
    <title>Monopoly</title>
	<meta name="viewport" content="width=device-width, height=device-height; initial-scale=0.9; maximum-scale=0.9; user-scalable=false;" />
    
    <link href="style/game.css" rel="stylesheet">
    
    
    <link href="style/board.css" rel="stylesheet">
    <link href="style/board-top.css" rel="stylesheet">
    <link href="style/board-left.css" rel="stylesheet">
    <link href="style/board-right.css" rel="stylesheet">
    <link href="style/board-under.css" rel="stylesheet">
    <link href="style/board-hooks.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style/transitions.php?duration=1000&transition=easeInCirc">
    

	<script src="http://code.jquery.com/jquery-2.1.1.js"></script>
    <script src="js/jQueryRotate.js"></script>
    <script src="js/houses.js"></script>
    <script>

        //http://code.jquery.com/jquery-1.10.2.min.js
        var freePark = 0;
        var places = new Array();
        var tokens = new Array();
        var money = new Array();
        var playerName = new Array();
        var rounds = new Array();
        var gevangCards = new Array();
        var gevang = new Array(0,0,0,0,0,0,0);
        var chanceCards = new Array(0<?php foreach($chanceCards as $key => $val){echo ','.$val;} ?>);
        var chanceNum = 1;
        var communCards = new Array(0<?php foreach($communCards as $key => $val){echo ','.$val;} ?>);
        var communNum = 1;
        
    <?php
        echo "\n\n";
            $i = 0;
        foreach($player as $key => $value){
            echo '
            places['.$key.'] = '.$place[$key].';
            tokens['.$key.'] = '.$token[$key].';
            money['.$key.'] = '.$money[$key].';
            playerName['.$key.'] = "'.$value.'";
            rounds['.$key.'] = 0;                                            // AANPASSEN NAAR 0!
            gevangCards['.$key.'] = 0;
            ';
            $i++;
        }

        
        
    ?>
    
        var whois = 1;
        var firstPlayer = 1;
        var lastPlayer = <?php echo $i; ?>;
        

		$(document).ready(function(){
            var angle = 0;
            var angleTwo = 0;
            $("#rotateLeft").click(function (){
                angle-=90;
                angleTwo+=90;
                $("#board").rotate({animateTo:angle});
                $( "#board #chance-cards" ).css("margin","-5px 0 0 -240px");
                $( "#board #chest-cards" ).css("margin","-5px 0 0 -240px");
                <?php 
                    $i = 0;
                    foreach($player as $key){
                        $i++;
                        echo '
                        $( "#pion'.$i.'" ).css("margin","-5px 0 0 -240px");
                        $( "#pion'.$i.'" ).rotate({animateTo:angleTwo});';
                    }
                ?>
                
            });
            $("#rotateRight").click(function (){
                angle+=90;
                angleTwo-=90;280
                $("#board").rotate({animateTo:angle});
                $( "#board #chance-cards" ).css("margin","-5px 0 0 -240px");
                $( "#board #chest-cards" ).css("margin","-5px 0 0 -240px");
                $( "#board .logo-mark" ).css("margin","-59px 0 0 -280px");
                <?php 
                    $i = 0;
                    foreach($player as $key){
                        $i++;
                        echo '
                        $( "#pion'.$i.'" ).css("margin","-5px 0 0 -240px");
                        $( "#pion'.$i.'" ).rotate({animateTo:angleTwo});';
                    }
                ?>
                
                
            });
		});
        
        setTimeout(function (){
            $( "#housePanel .housePanelName"+whois ).addClass( "selected" );
        }, 10);

        

	</script>
    <script src="js/functions.js"></script>
    <script src="js/script.js"></script>

</head>
<body>

<div class="game-info">
    <table>
        <tr>
            <th class="pion">
                Pion
            </th>
            <th>
                Spelers
            </th>
            <th>
                Geld
            </th>
        </tr>
        <?php
            foreach($player as $key => $value){
                echo '
                
        <tr id="user'.$key.'">
            <td class="pion" style="padding: 0px;">
                <img src="icons/tokens/'.$token[$key].'.png" height="30"/>
            </td>
            <td>
                '.$value.'
            </td>
            <td>
                &euro; <span class="money'.$key.'">'.$money[$key].'</span>,-
            </td>
        </tr>
                
                ';
            }
        
        ?>
    </table>
</div>