<?php 

    if($_GET['kind'] == 1){
        commun($_GET['value']);
    }
    if($_GET['kind'] == 2){
        chance($_GET['value']);
    }
    function commun($val){
        
        if($val == 1){
            $text = "Verlaat de gevangenis zonder te betalen.";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 2;
        }
        if($val == 2){
            $text = "Ga direct naar de gevangenis.<br />Ga niet langs start.<br />U ontvangt geen &euro; 20000,-";
            $goto = 41;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 1;
        }
        
        
        
        
        if($val == 3){
            $text = "Ga verder naar start.";
            $goto = 1;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 4){
            $text = "Ga terug naar Dorpsstraat<br />(Het Dorp)";
            $goto = 2;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        
        
        
        
        if($val == 5){
            $text = "Door verkoop van effecten ontvangt u<br />&euro; 5000,-";
            $goto = 0;
            $getMoney = 5000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 6){
            $text = "U erft &euro; 10000,-";
            $goto = 0;
            $getMoney = 10000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 7){
            $text = "Lijfrente vervalt.<br />U ontvangt &euro; 10000,-";
            $goto = 0;
            $getMoney = 10000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 8){
            $text = "U ontvangt rente van<br />7% preferente aandelen:<br />&euro; 2500,-";
            $goto = 0;
            $getMoney = 2500;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 9){
            $text = "U heeft de tweede prijs in een<br />schoonheidswedstrijd gewonnen.<br />U ontvangt &euro; 1000,-";
            $goto = 0;
            $getMoney = 1000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 10){
            $text = "Een vergissing van de bank in uw voordeel.<br />U ontvangt &euro; 20000,-";
            $goto = 0;
            $getMoney = 20000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 11){
            $text = "Restitutie inkomstenbelasting.<br />U ontvangt &euro; 2000,-";
            $goto = 0;
            $getMoney = 2000;
            $payMoney = 0;
            $gevang = 0;
        }
        
        
        
        
        if($val == 12){
            $text = "Betaal uw verzekeringspremie:<br />&euro; 5000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 5000;
            $gevang = 0;
        }
        if($val == 13){
            $text = "Betaal uw doktersrekening:<br />&euro; 5000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 5000;
            $gevang = 0;
        }
        if($val == 14){
            $text = "Betaal het ziekenhuis &euro; 10000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 10000;
            $gevang = 0;
        }
        
        
        
        
        if($val == 15){
            $text = "U bent jarig en ontvangt<br />van iedere speler &euro; 1000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 3;
            $gevang = 0;
        }
        if($val == 16){
            $text = "Betaal &euro; 1000,- boete of neem<br />een kans-kaart";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 4;
            $gevang = 0;
        }
        doCard($text,$goto,$getMoney,$payMoney,$gevang);
    }

    function chance($val){
        
        if($val == 1){
            $text = "Verlaat de gevangenis zonder te betalen.";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 2;
        }
        if($val == 2){
            $text = "Ga direct naar de gevangenis.<br />Ga niet langs start.<br />U ontvangt geen &euro; 20000,-";
            $goto = 41;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 1;
        }
        
        
        
        
        if($val == 3){
            $text = "Ga verder naar Heerestraat.<br />Indien u langs start komt,<br />ontvangt u &euro; 20000,-";
            $goto = 25;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 4){
            $text = "Ga verder naar Barteljorisstraat.<br />Indien u langs start komt,<br />ontvangt u &euro; 20000,-";
            $goto = 12;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 5){
            $text = "Reis naar Station West.<br />Indien u langs start komt,<br />ontvangt u &euro; 20000,-";
            $goto = 16;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 6){
            $text = "Ga verder naar start.";
            $goto = 1;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 7){
            $text = "Ga verder naar Kalverstraat.";
            $goto = 40;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 8){
            $text = "Ga drie plaatsen terug.";
            $goto = -3;
            $getMoney = 0;
            $payMoney = 0;
            $gevang = 0;
        }
        
        
        
        
        if($val == 9){
            $text = "U heeft een kruiswoordpuzzel gewonnen.<br />U ontvangt &euro; 10000,-";
            $goto = 0;
            $getMoney = 10000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 10){
            $text = "Uw bankverzekering vervalt.<br />U ontvangt &euro; 15000,-";
            $goto = 0;
            $getMoney = 15000;
            $payMoney = 0;
            $gevang = 0;
        }
        if($val == 11){
            $text = "De bank betaalt u &euro; 5000,- dividend";
            $goto = 0;
            $getMoney = 5000;
            $payMoney = 0;
            $gevang = 0;
        }
        
        
        
        
        if($val == 12){
            $text = "Betaal schoolgeld<br />&euro; 15000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 15000;
            $gevang = 0;
        }
        if($val == 13){
            $text = "Opgebracht wegens dronkenschap.<br />Betaal &euro; 2000,- boete";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 2000;
            $gevang = 0;
        }
        if($val == 14){
            $text = "Boete voor te snel rijden.<br />Betaal &euro; 2000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 1500;
            $gevang = 0;
        }
        if($val == 15){
            $text = "U wordt aangeslagen voor straatgeld:<br />&euro; 4000,- per huis<br />&euro; 11500,- per hotel";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 1;
            $gevang = 0;
            $special = 1;
        }
        if($val == 16){
            $text = "Repareer uw huizen<br />Betaal voor elk huis &euro; 2500,-<br />Betaal voor elk hotel &euro; 10000,-";
            $goto = 0;
            $getMoney = 0;
            $payMoney = 2;
            $gevang = 0;
        }
        doCard($text,$goto,$getMoney,$payMoney,$gevang);
    }
    
    function doCard($text,$goto,$getMoney,$payMoney,$gevang){
        
        $script = "";
        $buttons = "";
        $bttn = 1;
        
        if($goto > 0 AND $goto != 41){
            $script = '
                
                //moveToken('.$goto.',"'.$_GET['whois'].'");
            ';
            $bttn = 0;
            $buttons = '<input type="button" onclick="popupbox(0, 1);setTimeout(moveToken('.$goto.',\''.$_GET['whois'].'\',1),500);" value="Ga verder" />';
        }elseif($goto == -3){
            $script = '
                var som = 3;
                if(places['.$_GET['whois'].'] < 4){
                    som = 3 - places['.$_GET['whois'].'];
                    places['.$_GET['whois'].'] = 40;
                }
                places['.$_GET['whois'].'] = places['.$_GET['whois'].'] - som;
                $("#places").load( "includes/place.php?place="+places+"&token="+tokens);
            ';
            $bttn = 1;
        }elseif($goto == 41){
            $script = '
                places['.$_GET['whois'].'] = 41;
                gevang['.$_GET['whois'].'] = 1;
                $("#places").load( "includes/place.php?place="+places+"&token="+tokens);
            ';
            $bttn = 1;
        }
        if($gevang == 2){
            $script = '
                gevangCards['.$_GET['whois'].']++;
            ';
            $bttn = 1;
        }
        if($getMoney > 10){
            $script = '
                money['.$_GET['whois'].'] = money['.$_GET['whois'].'] + '.$getMoney.';
            ';
            $bttn = 1;
        }
        if($payMoney > 10){
            $script = '
                money['.$_GET['whois'].'] = money['.$_GET['whois'].'] - '.$payMoney.';
                freePark = freePark + '.$payMoney.';
            ';
            $bttn = 1;
        }
        if($payMoney == 1){

            $script = '
                var toPay = 0;
                logger("Huizen en hotels betalen");

                for(var i=0;i<houseOwner.length;i++){
                    if(houseOwner[i] == '.$_GET['whois'].'){
                        if(houseLevel[i] == 5){
                            toPay += 11500;
                        }else{
                            toPay += houseLevel[i]*4000;
                        }
                    }
                }


                function payForAllHouses(){

                    if(money['.$_GET['whois'].'] < toPay){
                        alertBox("<strong>Te weinig geld!</strong><br />Helaas, te weinig geld. Verkoop wat huizen. <br />Je zult er nog wel straatgeld voor moeten betalen!", function(){
                            var houseSell = "<table style=\'width: 100%;text-align: left;\'>";
                            for(var i=0;i<houseOwner.length;i++){
                                if(houseOwner[i] == '.$_GET['whois'].'){
                                    if(houseLevel[i] == 5){
                                        houseSell += "<tr><td>"+houseStreet[i]+"</td><td> &euro; "+houseLevelBuy[i]*0.9+",-</td><td><input type=\'button\' onclick=\'sellOneHouse(i)\' value=\'Verkoop\' /></td></tr>";
                                    }else if(houseLevel[i] > 0){
                                        houseSell += "<tr><td>"+houseStreet[i]+"</td><td> &euro; "+houseLevelBuy[i]*0.9+",-</td><td><input type=\'button\' onclick=\'sellOneHouse("+i+")\' value=\'Verkoop\' /></td></tr>";
                                    }
                                }
                            }
                            houseSell += "</table>";

                            setTimeout(function(){
                                alertBox("<strong>Huizen verkopen</strong><br /> <span style=\'color: red;\'>Nog &euro; "+(toPay-money['.$_GET['whois'].'])+",- nodig.</span>"+houseSell,"","",0);
                            }, 200);
                            return false;
                        }, "",1);
                        document.getElementById("payHouses").style.display = "none";
                    }else{
                        money['.$_GET['whois'].'] -= toPay;
                        updateMoney();
                    }

                }

                function sellOneHouse(i){
                    $( "#alertBox" ).fadeOut(200);
                    $( ".darkBG" ).delay(200).fadeOut(200);
                    houseLevel[i]--;
                    updateHouses();
                    money[houseOwner[i]] += houseLevelBuy[i]*0.9;
                    updateMoney();
                    setTimeout(payForAllHouses,500);

                }
                console.log(toPay);

            ';
            $bttn = 0;
            $buttons = '<input type="button" onclick="popupbox(0, 1);setTimeout(payForAllHouses,500);" value="Betalen" id="payHouses" />';
            /*
            if($val == 15){
                $text = "U wordt aangeslagen voor straatgeld:<br />&euro; 4000,- per huis<br />&euro; 11500,- per hotel";
                $goto = 0;
                $getMoney = 0;
                $payMoney = 1;
                $gevang = 0;
                $special = 1;
            }
            if($val == 16){
                $text = "Repareer uw huizen<br />Betaal voor elk huis &euro; 2500,-<br />Betaal voor elk hotel &euro; 10000,-";*/

        }else if($payMoney == 2){

            $script = '
                var toPay = 0;
                for(var i=0;i<houseOwner.length;i++){
                    if(houseOwner[i] == '.$_GET['whois'].'){
                        if(houseLevel[i] == 5){
                            toPay += 10000;
                            logger("hotel: "+10000);
                        }else{
                            toPay += houseLevel[i]*2500;
                            logger(houseLevel[i]+" huizen: "+(houseLevel[i]*2500));
                        }
                    }
                }


                function payForAllHouses(){

                    if(money['.$_GET['whois'].'] < toPay){
                        alertBox("<strong>Te weinig geld!</strong><br />Verkoop wat huizen. Je zult er nog wel straatgeld voor moeten betalen.", "", "",1);
                        document.getElementById("payHouses").style.display = "none";
                    }else{
                        money['.$_GET['whois'].'] -= toPay;
                        updateMoney();
                    }

                }
                console.log(toPay);

            ';
            $bttn = 0;
            $buttons = '<input type="button" onclick="popupbox(0, 1);setTimeout(payForAllHouses,500);" value="Betalen" id="payHouses" />';
        }
            
            
            
            if($bttn == 1){
                $buttons = '
                    <input type="button" onclick="popupbox(0, 1);updateMoney();" value="Ga verder" />
                ';
            }else{
                
            }
            
        if($_GET['kind'] == 1){
            
            echo '
                <div class="commun">
                    <div class="text">
                        '.$text.'
                    </div>
                    <div id="chest-cards" align="center">
                        <div class="circle">
                        </div>
                    </div>
                    <div class="buttons">
                        '.$buttons.'
                    </div>
                    <script>
                        '.$script.'
                    </script>
                </div>
            ';
        }else{
            echo '
                <div class="chance">
                    <div class="text">
                        '.$text.'
                    </div>
                    <div id="chance-cards" align="center">
                        <div class="circle">
                        </div>
                    </div>
                    <div class="buttons">
                        '.$buttons.'
                    </div>
                    <script>
                        '.$script.'
                    </script>
                </div>
            ';
        }
    }
?>