
		$(document).ready(function(){
            $("#board .under-hooks .jail .box").rotate(45);
            $("#board #chance-cards").rotate(-45);
            $("#board #chest-cards").rotate(135);
            $("#board .logo-mark").rotate(-45);
            
            $("#places").load( "includes/place.php?place="+places+"&token="+tokens);
            
            $( "#user1" ).addClass( "selected" );
            
            
            
            var left = ($( "#board" ).width()/2)+$( "#board" ).position().left;
            $( ".game-info" ).css("left",""+left+"px");
            
            
            $( ".dobbel" ).css("left",""+left+"px");
            
            
            $( ".game-info" ).hover(function() {
            
                
                //$( ".game-info .pion" ).stop().fadeIn( 400 );
                $( ".game-info .pion" ).stop().animate({
                    opacity: 1,
                    maxWidth: "55px"
                }, 400 );
                $( ".game-info .pion img" ).stop().animate({
                    height: "30px"
                }, 400 );
                $( ".game-info" ).stop().animate({
                    margin: "0 0 0 -150px",
                    width: "300px"
                }, 400 );
                
                
            }, function() {
                //$( ".pion" ).stop().delay(400).fadeOut( 400 );
                $( ".game-info .pion" ).stop().animate({
                    opacity: 0,
                    maxWidth: "0px"
                }, 400 );
                $( ".game-info .pion img" ).stop().animate({
                    height: "0px"
                }, 400 );
                
                
                $( ".game-info" ).stop().animate({
                    margin: "0 0 0 -100px",
                    width: "200px"
                }, 400 );
            });
            updateHouses();
            
            
            var cardDeck = 0;
            $( "#cardDeck #onHover .inner" ).click(function() {
                if(cardDeck == 0){
                    $( "#cardDeck #onHover .inner" ).removeClass( "fa-bars" );
                    $( "#cardDeck #onHover .inner" ).removeClass( "fa" );
                    $( "#cardDeck #onHover .inner" ).html( $( "#cardDeck #onHover .text" ).html() + "<div id='doWithStreet'></div>" );


                    $( "#cardDeck #onHover .inner").addClass("openCardDeck");
                    //$( "#cardDeck #onHover .inner" ).css({  });
                    
                    
                    $( "#cardDeck #onHover .inner .houses" ).click(function(){
                        var x = $( this ).attr('class').replace( /^\D+/g, '');
                        x = parseInt(x);

                        $("#doWithStreet").load( "includes/doWithStreet.php?street="+x+"&whois="+whois );
                        $("#doWithStreet").html(); //  ----------------------------------------------------------------------------------------    <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
                        
                    });
                    
                    setTimeout(function (){
                        cardDeck = 1;
                    },1000);
                    //$( "#cardDeck #onHover .inner" ).stop().animate({ width: "250px", height: "400px", fontSize: "14px" }, 1000, function(){ cardDeck++; });
                    
                }
                
            });
            
            
            
            $( "#cardDeck #onHover .inner" ).hover("", function() {
                if(cardDeck == 1){
                    $( "#cardDeck #onHover .inner" ).addClass( "fa-bars" );
                    $( "#cardDeck #onHover .inner" ).addClass( "fa" );
                    $( "#cardDeck #onHover .inner" ).html( "" );
                    $( "#cardDeck #onHover .inner" ).removeClass( "openCardDeck" );

                    //$( "#cardDeck #onHover .inner" ).css({width: "35px",height: "39px", fontSize: "40px", cursor: "pointer"});
                    
                    setTimeout(function (){
                        cardDeck = 0;
                    },1000);
                    //$( "#cardDeck #onHover .inner" ).stop().animate({width: "36px",height: "40px", fontSize: "40px"}, 1000, function(){ cardDeck--; });
                    
                }
            });

            if(logging == false){
                document.getElementById("console").style.display = "none";
            }

		});

        function updateHouses(){
            for(var i=0;i < houseLevel.length;i++){
                if(document.querySelector(".housePlace-x"+i)){
                    addHouses(document.querySelector(".housePlace-x"+i),houseLevel[i])
                }
            }
        }
        function addHouses(parent,level){
            parent.innerHTML = "";
            var el = document.createElement("div");

            if(level < 5 && level != 0){
                el.setAttribute("class","house");
                var text = "";
                var a = 0;
                while(a<level){
                    text = text+'<img src="icons/tokens/house.png" />';
                    a++;
                }
                el.innerHTML = text;
            }
            if(level == 5){
                el.setAttribute("class","hotel");
                el.innerHTML = '<img src="icons/tokens/hotel.png" />';
            }
            parent.appendChild(el);
        }

        function popupbox(a, src){
            if(a == 1){
                $( "#popup" ).fadeIn(1);
                $( ".darkBG" ).fadeIn(500);
                $( "#popup .box" ).delay(500).fadeIn(500);
                $("#popup .box .inner").load( src );
                
            }else if(a == 2){
                $( "#popup" ).fadeIn(1);
                $( ".darkBG" ).fadeIn(500);
                $( "#popup .box" ).delay(500).fadeIn(500);
            }else{
                $( "#popup" ).delay(1000).fadeOut(1);
                $( ".darkBG" ).delay(500).fadeOut(500);
                $( "#popup .box" ).fadeOut(500);
            }
        }
        var popup = popup || {};
        popup.trade = {
            setPlayer1: function(id,name,cards){
                this.p1Id = id;
                this.p1Name = name;
                this.p1Cards = cards;
            },
            setPlayer2: function(id,name,cards){
                this.p2Id = id;
                this.p2Name = name;
                this.p2Cards = cards;
            },
            getPlayer1: function(){
                return {id: this.p1Id,name: this.p1Name, cards: this.p1Cards};
            },
            getPlayer2: function(){
                return {id: this.p2Id,name: this.p2Name, cards: this.p2Cards};
            },
            openWindow: function(){
                $( "#popup" ).fadeIn(1);
                $( ".darkBG" ).fadeIn(500);
                $( "#popup .box" ).delay(500).fadeIn(500);
                $("#popup .box .inner").html(this.getPlayer1().name +" - "+ this.getPlayer2().name);
            },
            tradeAnswer: function(answer){
                this.answer = answer;
            }
        };
        var trade = popup.trade;
        trade.setPlayer1(1,"Alwin", 1);
        trade.setPlayer2(2,"Eline", 1);
        setTimeout(function(){
            //trade.openWindow();
        },1000);

        //setTimeout(function(){
        //    fu(1, "includes/cards.php?kind=2&value="+15+"&whois=1");
        //},1);
         /**/
        function getCard(kind,whoIsPlayer){

            logger(playerName[whoIsPlayer]+": Krijg kaart: "+kind);
            if(kind == "commun"){
                popupbox(1, "includes/cards.php?kind=1&value="+communCards[communNum]+"&whois="+whoIsPlayer);
                communNum++;
            }
            if(kind == "chance"){
                popupbox(1, "includes/cards.php?kind=2&value="+chanceCards[chanceNum]+"&whois="+whoIsPlayer);
                chanceNum++;
            }
        }
        
        
        function alertBox(question, yesCallback, noCallback,type,bttnYes, bttnNo){

            if(!yesCallback){
                function yesCallback(){

                }
            }
            if(!noCallback){
                function noCallback(){

                }
            }
            $( "#alertBox .bttns #no" ).fadeIn(1);
            $( "#alertBox .bttns #yes" ).fadeIn(1);

            if(type == 0){

                $( "#alertBox .bttns #no" ).fadeOut(1);
                $( "#alertBox .bttns #yes" ).fadeOut(1);
            }else if(type == 1){

                $( "#alertBox .bttns #no" ).fadeOut(1);
                $( "#alertBox .bttns #yes" ).val( "Oke" );
            }else if(type == 10){

                $( "#alertBox .bttns #no" ).fadeOut(1);
                $( "#alertBox .bttns #yes" ).val( bttnYes );
            }else if(type == 11){

                $( "#alertBox .bttns #no" ).val( bttnNo );
                $( "#alertBox .bttns #yes" ).val( bttnYes );
            }else{
                $( "#alertBox .bttns #no" ).val( "Nee" );
                $( "#alertBox .bttns #yes" ).val( "Ja" );
            }
            
            
            $( "#alertBox .question" ).html(question);
            $( ".darkBG" ).fadeIn(200);
            $( "#alertBox" ).delay(200).fadeIn(200);
            var x = 0;
            
            $( "#alertBox .bttns #no" ).click(function(){
                noCallback();
                $( "#alertBox" ).fadeOut(200);
                $( ".darkBG" ).delay(200).fadeOut(200);
            });
            $( "#alertBox .bttns #yes" ).click(function(){
                yesCallback();
                $( "#alertBox" ).fadeOut(200);
                $( ".darkBG" ).delay(200).fadeOut(200);
            });
        }
        
        jQuery(window).bind('beforeunload', function(){
            //return "Wilt u op de pagina blijven?\nHet spel kan dan niet worden hervat!";
        });
        function playPanel(){
            
            for(var i=1;i<playerName.length;i++){
                var houseBuyed = "<table>";
                for(var q=0;q<housePlaces.length;q++){
                    if(houseOwner[q] == i){
                        houseBuyed = houseBuyed + "<tr><td>" + houseStreet[q] + "</td><td>" + towns[houseTown[q]] + "</td></tr>";
                        $( "#housePanel .housePanelHouses"+i ).html( houseBuyed );
                    }
                }
                $( "#housePanel .housePanelHouses"+i ).html( houseBuyed + "</table>" );
            }
            
            var houseBuyed = "<h3>" + playerName[whois] + "</h3>";
            houseBuyed = houseBuyed + "<h4>&euro; " + money[whois] + ",-</h4>";
            houseBuyed = houseBuyed + "<table>";
            houseBuyed = houseBuyed + "<tr><th>Straat</th><th>Plaats</th></tr>";
            for(var q=0;q<housePlaces.length;q++){
                if(houseOwner[q] == whois){
                    houseBuyed = houseBuyed + "<tr class='house" + q + " houses'><td>" + houseStreet[q] + "</td><td>" + towns[houseTown[q]] + "</td></tr>";
                    $( "#cardDeck #onHover .text" ).html( houseBuyed );
                }
            }
            $( "#cardDeck #onHover .text" ).html( houseBuyed + "</table>" );
            
        }