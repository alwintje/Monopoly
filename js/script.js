


var logging = false;
//logger("clear");
        
var path = "icons/dice/";
var i = 0;
var cachedimages = new Array(6);
    cachedimages[0] = new Image();
    cachedimages[0].src = path + "face1.jpg";
    cachedimages[1] = new Image();
    cachedimages[1].src = path + "face2.jpg";
    cachedimages[2] = new Image();
    cachedimages[2].src = path + "face3.jpg";
    cachedimages[3] = new Image();
    cachedimages[3].src = path + "face4.jpg";
    cachedimages[4] = new Image();
    cachedimages[4].src = path + "face5.jpg";
    cachedimages[5] = new Image();
    cachedimages[5].src = path + "face6.jpg";

function throwDice(){
    var a = Math.floor((Math.random() * 5));
    var b = Math.floor((Math.random() * 5));
    
    window.document.die1.src = cachedimages[a].src;
    window.document.die2.src = cachedimages[b].src;
    a++;
    b++;
    c = i*10;
    $( ".dobbel .bttn" ).fadeOut(1);
    if(i < 20){
        setTimeout("throwDice()", 30+c);
        i++;
    }else{
        i=0;
        
        setTimeout(function (){
            $( ".selected" ).each(function(){
                $( this ).removeClass( "selected" );
            });
        },1999);
        var move = a + b;
        
        if(gevang[whois] > 0){
            if(gevang[whois] < 4){
                if(a != b){
                    move = 0;
                    places[whois] = 41;
                    gevang[whois]++;
                    if(gevangCards[whois] > 0){

                        logger("Verlaat gevangenis met kaart?");
                        alertBox("Wilt u de gevangenis verlaten met een kaart?", function(){
                            gevangCards[whois]--;
                            gevang[whois] = 0;
                            places[whois] = 11;
                            logger(playerName[whois]+" heeft gevangenis verlaten.");
                            whois++;
                        }, function(){
                            logger(playerName[whois]+" heeft gevangenis niet verlaten.");
                            whois++;
                        },0);
                    }else{
                        whois++;
                    }
                }else{
                    // dubbel gegooid
                    gevang[whois] = 0; // Niet meer gevangen
                    places[whois] = 11; // 
                    whois++;
                }
            }else{
                // Na 4 keer in de gevangenis
                gevang[whois] = 0;
                places[whois] = 11;
                moveToken(move,whois,0);
            }
            
        }else{
            moveToken(move,whois,0);
        }
        
        if(a == b){
            if(whois == 1){
                whois = lastPlayer;
            }else{
                whois--;
            }
        }
        setTimeout(function (){
            $( "#user"+whois ).addClass( "selected" );
            $( "#housePanel .housePanelName"+whois ).addClass( "selected" );
        },2000);
        $( ".dobbel .bttn" ).delay(2000).fadeIn(500);
        //$("#extern").load( "includes/dice.php?dobbel1="+a+"dobbel2="+b);
        setTimeout("playPanel()",2000);
    }
}

function moveToken(move,who,type){
        if(type != 1){
            var moveSteps = move;
            move = places[whois] + move;
        }else{
            var moveSteps = move - places[whois];
            if(moveSteps < 0){
                money[who] = money[who]+20000;
            }
        }
        
        if( move == 31 ){
            move = 41;
            logger(playerName[who]+": Naar de gevangenis (Door het bord)");
            if(moveSteps > 7){
                //alert("HOHO! Niet zo snel! Direct naar de gevangenis!");

                alertBox("HOHO! Niet zo snel! Direct naar de gevangenis!", "", "",1);
                logger(playerName[whois]+": naar de gevangenis");
            }else if(moveSteps < 4){
                //alert("Je gaat bijna niets vooruit! Wij brengen je wel weg ..... naar de gevangenis!");

                alertBox("Je gaat bijna niets vooruit! Wij brengen je wel weg ..... naar de gevangenis!", "", "",1);
                logger(playerName[whois]+": te lanzaam, naar de gevangenis");
            }else{
                //alert("Helaas, je moet naar de gevangenis!");

                alertBox("Helaas, je moet naar de gevangenis!", "", "",1);
                logger(playerName[whois]+": gewoon naar de gevangenis");
            }
            gevang[who] = 1;
        }
        if(move > 40 && gevang[who] == 0){
            move = move - 40;
            money[who] = money[who]+20000;
            rounds[who]++;
            logger(playerName[whois]+": Langs start, + € 20.000");
        }
        if(move == 1){
            money[who] = money[whois]+20000;
            logger(playerName[whois]+": Op start, + € 20.000");
        }
        
        if(move == 8 || move == 23 || move == 37){
            getCard("chance",whois);
        }
        if(move == 3 || move == 18 || move == 34){
            getCard("commun",whois);
        }
        if(move == 5){
            alertBox("Betaal je belasting! &euro; 20.000,-!", "", "",1);
            money[who] = money[whois]-20000;
            freePark = freePark + 20000;
            logger(playerName[whois]+": € 20.000,- belasting betalen");
        }
        if( move == 39){
            alertBox("Betaal je belasting! &euro; 10.000,-!", "", "",1);
            money[who] = money[whois]-10000;
            freePark = freePark + 10000;
            logger(playerName[whois]+": € 10.000,- belasting betalen");
        }
        
        
        if( move == 21){
            money[who] = money[whois]+freePark;
            freePark = 0;
        }
        
        updateMoney();
        
        places[who] = move;
        
        if(housePlaces.indexOf(move) != "-1"){
            onHouse(who,move,moveSteps);
        }
        
        if(whois == who){
            whois++;
        }
        if(whois > lastPlayer){
            whois=1;
        }
        
        $("#places").load( "includes/place.php?place="+places+"&token="+tokens);
        return whois;
}


function updateMoney(){
    for (var q = 1; q < money.length; q++) {
        //var a = parseInt( $( ".money"+q ).text() );
        //var b = money[q];
        if(parseInt( $( ".money"+q ).text() ) != money[q]){
            moneyAnimate(parseInt( $( ".money"+q ).text() ),money[q],q);
        }else{
            $( ".money"+q ).text( money[q] );
        }
        //console.log(money[q]);
    }
}

function moneyAnimate(a,b,q){
    if(a < b){
        a = a + 100;
    }else{
        a = a - 100;
    }
    
    $( ".money"+q ).text( a );
    if(a != b){
        setTimeout("moneyAnimate(" + a + "," + b + "," + q + ")", 0.5);
    }
}
function onHouse(who,move,moveSteps){
    logger("Wie: "+playerName[who]+", Plaats: "+move+", Stappen: "+moveSteps);
    if( houseOwner[housePlaces.indexOf(move)] == 0 ){
        if(rounds[who] != 0){
            canBuyStreet(who,housePlaces.indexOf(move));
            logger("Kan huis kopen: "+playerName[who]);
        }

    }else if( houseOwner[housePlaces.indexOf(move)] != who){
        payForHouse(who,housePlaces.indexOf(move),moveSteps);
        logger(playerName[who]+" is op het grond van "+playerName[ houseOwner[ housePlaces.indexOf(move) ] ]);
    }else{
        logger(playerName[who]+" is op een eigen straat");
    }
}
function canBuyStreet(who,house){
    //alert(houseTown[house]);
    //var i = confirm("Wilt u " + houseStreet[house] + " " + towns[houseTown[house]] + " kopen voor € " + houseBuy[house] + ",- ?");
    //alert(i);
    
    //$( "#popup" ).fadeIn(1);
    //$( "#popup .bg" ).fadeIn(500);
    //$( "#popup .box" ).delay(500).fadeIn(500);
    popupbox(2, 0);
    
    var buyStreetHTML = "Wilt u " + houseStreet[house] + " " + towns[houseTown[house]] + " kopen voor<br />&euro; " + houseBuy[house] + ",-<br />";
    var buyStreetButtons = "<input type='button' onclick='popupbox(0, 0)' value='Niet kopen' /><input type='button' onclick='buyStreet(" + who + "," + house + ");' value='Kopen' />";
    $( "#popup .box .inner" ).html( "<div class='house'>" + buyStreetHTML + "<div class='buttons' align='center'>" + buyStreetButtons + "</div><div class='icon'></div></div>" );
}
function buyStreet(who,house){
    if(money[who] < houseBuy[house]){
        $( "#popup .box .inner" ).html( "<div class='house'>U heeft niet genoeg geld om dit te kopen.<div class='buttons' align='center'><input type='button' onclick='popupbox(0, 0)' value='Ga verder' /></div><div class='icon'></div></div>" );
    }else{
        houseOwner[house] = who;
        houseInUse[house] = 1;
        money[who] = money[who] - houseBuy[house];
        updateMoney();
        playPanel();
        popupbox(0, 0);
    }
}

function buyHouse(house,who){

    logger(playerName[who]+": Wil huizen kopen");
    if(houseLevel[house] != 5){
        var a = 0;
        for(var i=0;i<houseTown.length;i++){
            if(houseTown[i] == houseTown[house]){
                if(houseOwner[i] != houseOwner[house]){
                    a++;
                }
            }
        }
        if(a == 0){
            if(money[who] < houseLevelBuy[house]){
                // niet genoeg geld
                
                alertBox("U heeft niet genoeg geld om een huis te kopen.", "", "",1);
                logger(playerName[who]+": Niet genoeg geld");
            }else{
                logger(playerName[who]+": Huis erbij gekocht");
                alertBox("U heeft een huis gekocht voor &euro; "+houseLevelBuy[house]+",-", "", "",1);
                houseLevel[house]++;
                money[who] = money[who]-houseLevelBuy[house];
            }
        }else{
            // niet alle straten
            alertBox("U heeft niet alle straten om een huis te kopen.", "", "",1);
            logger(playerName[who]+": Niet alle straten");
        }
        
    }else{
        alertBox("U kunt niet meer dan 5 huizen (hotel), op 1 straat hebben.", "", "",1);
        logger(playerName[who]+": Al een hotel");
    }
    updateMoney();
    updateHouses();
}
function turnHouse(house,who){

    logger(playerName[who]+": Huis omdraaien");

    if(houseLevel[house] > 0){
        logger(playerName[who]+": Heeft huizen");
        alertBox("U heeft hier huizen staan, verkoop die eerst.", "", "",1);
    }else{
        if(houseInUse[house] == 0){

            if(houseBuy[house] > money[who]){
                logger(playerName[who]+": Niet genoeg geld.");
                alertBox("U heeft niet genoeg geld. U heeft &euro; "+money[who]+",- en bent &euro; "+houseBuy[house]+",- nodig.", "", "",1);
            }else{
                money[who] = money[who]-(houseBuy[house]);
                houseInUse[house] = 1;
                logger(playerName[who]+": straat '"+houseStreet[house]+"' is weer bruikbaar.");
                alertBox("De straat '"+houseStreet[house]+"' is weer bruikbaar.", "", "",1);
            }
        }else{
            money[who] = money[who]+(houseBuy[house]*0.9);
            houseInUse[house] = 0;
            logger(playerName[who]+": straat '"+houseStreet[house]+"' onbruikbaar.");

            alertBox("De straat '"+houseStreet[house]+"' is nu niet meer bruikbaar. Hij is weer bruikbaar als je hem weer omdraaid.", "", "",1);
        }
    }
    updateMoney();
    updateHouses();

}


function sellHouse(house,who){

    logger(playerName[who]+": Wil huizen verkopen");
    if(houseLevel[house] > 0){
        houseLevel[house]--;
        money[who] = money[who]+(houseLevelBuy[house]*0.9);
        alertBox("U heeft een huis verkocht. Dit heeft u &euro; "+(houseLevelBuy[house]*0.9)+",- opgeleverd.", "", "",1);
        logger(playerName[who]+": Huis verkocht");
    }else{
        alertBox("U heeft geen huizen op deze straat.", "", "",1);
        logger(playerName[who]+": Geen huizen");
    }
    updateMoney();
    updateHouses();
}

function payForHouse(who,house,moveSteps){
    if(houseInUse[house] != 0) {
        if (house == 3 || house == 11 || house == 18 || house == 26) {
            var moneyToPay = 0;
            var houseStationArray = new Array(3, 11, 18, 26);
            for (var i = 0; i <= 4; i++) {
                if (houseOwner[house] == houseOwner[houseStationArray[i]]) {
                    moneyToPay + 2500;
                }
            }
            money[who] = money[who] - moneyToPay;
            money[houseOwner[house]] = money[houseOwner[house]] + moneyToPay;
            alertBox("Helaas " + playerName[who] + ", je moet " + playerName[houseOwner[house]] + " &euro; " + moneyToPay + ",- betalen.", "", "", 1);
            logger("1:: "+playerName[who] + " moet € " + moneyToPay + ",- aan " + playerName[houseOwner[house]] + " betalen.");
        } else if (house == 8 || house == 21) {
            if (houseOwner[8] == houseOwner[21]) {
                var moneyToPay = moveSteps * 1000;
            } else {
                var moneyToPay = moveSteps * 400;
            }
            money[who] = money[who] - moneyToPay;
            money[houseOwner[house]] = money[houseOwner[house]] + moneyToPay;
            alertBox("Helaas " + playerName[who] + ", je moet " + playerName[houseOwner[house]] + " &euro; " + moneyToPay + ",- betalen.", "", "", 1);
            logger("2:: "+playerName[who] + " moet € " + moneyToPay + ",- aan " + playerName[houseOwner[house]] + " betalen.");
        } else {
            if (houseLevel[house] == 0) {
                var a = 0;
                for (var i = 0; i < houseTown.length; i++) {
                    if (houseTown[i] == houseTown[house]) {
                        if (houseOwner[i] != houseOwner[house]) {
                            a++;
                        }
                    }
                }
                if (a == 0) {
                    var toPay = houseLevelPrice[0][house] * 2;
                    money[who] = money[who] - toPay;
                    money[houseOwner[house]] = money[houseOwner[house]] + toPay;
                    alertBox("Helaas " + playerName[who] + ", je moet " + playerName[houseOwner[house]] + " &euro; " + toPay + ",- betalen.", "", "", 1);
                    logger("3:: "+playerName[who] + " moet € " + toPay + ",- aan " + playerName[houseOwner[house]] + " betalen.");
                } else {
                    money[who] = money[who] - houseLevelPrice[0][house];
                    money[houseOwner[house]] = money[houseOwner[house]] + houseLevelPrice[0][house];
                    alertBox("Helaas " + playerName[who] + ", je moet " + playerName[houseOwner[house]] + " &euro; " + houseLevelPrice[0][house] + ",- betalen.", "", "", 1);
                    logger("4:: "+playerName[who] + " moet € " + houseLevelPrice[0][house] + ",- aan " + playerName[houseOwner[house]] + " betalen.");
                }
            } else {
                if(money[who] < houseLevelPrice[houseLevel[house]][house]){
                    notEnoughMoney(who, houseLevelPrice[houseLevel[house]][house]-money[who]);
                }
                //money[who] -= houseLevelPrice[houseLevel[house]][house];
                //money[houseOwner[house]] = money[houseOwner[house]] + houseLevelPrice[houseLevel[house]][house];
                //
                //alertBox("Helaas " + playerName[who] + ", je moet " + playerName[houseOwner[house]] + " &euro; " + houseLevelPrice[houseLevel[house]][house] + ",- betalen.", "", "", 1);
                logger("5:: "+playerName[who] + " moet € " + houseLevelPrice[houseLevel[house]][house] + ",- aan " + playerName[houseOwner[house]] + " betalen.");
            }
        }
    }
    updateMoney();
}
function notEnoughMoney(who, need){
    var houseSell = "<table style=\'width: 100%;text-align: left;\'>";
    for(var i=0;i<houseOwner.length;i++){
        if(houseOwner[i] == who){
            if(houseLevel[i] == 5){
                houseSell += "<tr><td>"+houseStreet[i]+"</td><td> &euro; "+houseLevelBuy[i]*0.9+",-</td><td><input type=\'button\' onclick=\'sellOneHouse(i)\' value=\'Verkoop\' /></td></tr>";
            }else if(houseLevel[i] > 0){
                houseSell += "<tr><td>"+houseStreet[i]+"</td><td> &euro; "+houseLevelBuy[i]*0.9+",-</td><td><input type=\'button\' onclick=\'sellOneHouse("+i+")\' value=\'Verkoop\' /></td></tr>";
            }
        }
    }
    houseSell += "</table>";

    alertBox("<strong>Huizen verkopen of omdraaien</strong><br /> <span style=\'color: #ff0000;\'>Nog &euro; "+need+",- nodig.</span>"+houseSell,"","",0);

}

function logger(log) {
    if(logging == true){

        $.ajax({
            type: "POST",
            url: "includes/logging.php",
            data: {log: log}
        });

        $( "#console" ).html( $( "#console").html() + "<br />" + log );

        if(document.getElementById("console")){

            var objDiv = document.getElementById("console");
            objDiv.scrollTop = objDiv.scrollHeight;
        }
    }

}