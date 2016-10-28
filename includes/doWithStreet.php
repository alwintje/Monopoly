<?php

// var_dump($_GET);

//echo $_GET['array'];


       // $_GET['street']
        

echo '
    <div class="title"></div>
    <a id="turnHouse" >Omdraaien &euro; <span id="housePrice"></span>,-</a><br />
    <a id="buyHouse" >Huis kopen &euro; <span id="housePrice"></span>,-</a><br />
    <a id="sellHouse" >Huis verkopen &euro; <span id="housePrice"></span>,-</a>


    <style>
        #doWithStreet .title{
            width: 100%;
            border-top: solid 1px #555;
            font-weight: 600;
        }
    </style>
    <script>
        $( "#doWithStreet .title" ).html( houseStreet['.$_GET['street'].'] + " " + towns[houseTown['.$_GET['street'].']] );
        $( "#doWithStreet #buyHouse" ).click(function(){
            buyHouse('.$_GET['street'].','.$_GET['whois'].');
        });
        $( "#doWithStreet #turnHouse" ).click(function(){
            turnHouse('.$_GET['street'].','.$_GET['whois'].');
        });


        if(houseLevel['.$_GET['street'].'] == 0){
            $( "#doWithStreet #turnHouse" ).fadeIn(1);
        }else{
            $( "#doWithStreet #turnHouse" ).fadeOut(1);
        }

        if(houseLevel['.$_GET['street'].'] == 0 || houseInUse['.$_GET['street'].'] == 0){
            $( "#doWithStreet #sellHouse" ).fadeOut(1);
        }else{
            $( "#doWithStreet #sellHouse" ).fadeIn(1);
        }

        if(houseLevel['.$_GET['street'].'] > 5 || houseInUse['.$_GET['street'].'] == 0){
            $( "#doWithStreet #buyHouse" ).fadeOut(1);
        }else{
            $( "#doWithStreet #buyHouse" ).fadeIn(1);
        }


        if(houseInUse['.$_GET['street'].'] == 0){
            $( "#doWithStreet #turnHouse #housePrice" ).html("-"+houseBuy['.$_GET['street'].']);
        }else{
            $( "#doWithStreet #turnHouse #housePrice" ).html("+"+houseBuy['.$_GET['street'].']*0.9);
        }


        $( "#doWithStreet #buyHouse #housePrice" ).html("-"+houseLevelBuy['.$_GET['street'].']);

        $( "#doWithStreet #sellHouse #housePrice" ).html("+"+houseLevelBuy[' . $_GET['street'] . ']*0.9);

    </script>
    
';
                            
?>