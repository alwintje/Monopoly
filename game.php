<?php

    require_once("includes/game-header.php");

?>

<div align="center">
    <div id="board">
            <?php 
            
                require_once("includes/board-top.php");
                
                require_once("includes/board-left.php");
                
                require_once("includes/board-right.php");
                
                require_once("includes/board-under.php");
                
                require_once("includes/board-hooks.php");
                
                //require_once("includes/functions.php");
                
                //require_once("includes/dice.php");
                
                require("includes/places.php");
                
                
            ?>

            <div class="middle">
                <?php
                
                $housePanelName = "";
                $housePanelHouses = "";
                
                foreach($player as $key => $value){
                
                
                    $plek = place($place[$key],0);
                    
                    echo '
                        <div id="pion'.$key.'" style="position: absolute;margin: -5px 0px 0px -240px;'.$plek.'" class="token">
                            <img src="icons/tokens/'.$token[$key].'.png" style="width: 50px;"/>
                        </div>
                    
                    ';
                    $housePanelName .= "<td class='housePanelName".$key." panelName'>".$value."</td>\n";
                    $housePanelHouses .= "<td class='housePanelHouses".$key."' ></td>\n";
                }
                
                
                ?>
                <div class="logo-mark"></div>
                <div id="chance-cards">
                    <div class="circle">
                    </div>
                </div>
                <div id="chest-cards">
                    <div class="circle">
                    </div>
                </div>
            </div>
            <div id="places"></div>
    </div>
    <div class="dobbel" align="center">  
        <img width="80" height="77" name="die1" src="icons/dice/face5.jpg">
        <img width="80" height="77" name="die2" src="icons/dice/face3.jpg">
        <div class="bttn">
            <input type="button" onclick="throwDice();" value="Gooi" style="cursor: pointer;" />
        </div>
    </div>
        
    <div id="housePanel">
        <table>
            <tr>
                <?php echo $housePanelName; ?>
            </tr>
            <tr>
                <?php echo $housePanelHouses; ?>
            </tr>
        </table>
    </div>
    <div id="cardDeck">
        <div id="onHover">
            <div class="text">
                <?php echo "<h3>".$player[1]."</h3>"; ?>
                <?php echo "<h4>".$money[1]."</h4>"; ?>
            </div>
            <div class="inner fa fa-bars easeInCirc">
                
            </div>
        </div>
    </div>
</div>





    <div class="darkBG"></div>
    <div id="popup">
        <div class="box">
            <div class="logo"></div>
            <div class="logo-mark"></div>
            <div class="inner">
                
            </div>
        </div>
    </div>
    
    
<div id="alertBox">
    <div class="question">
    </div>
    <div class="bttns">
        <input id="no" type="button" value="Nee" /><input id="yes" type="button" value="Ja" />
    </div>
</div>

<div id="extern"></div>

<input type="button" id="rotateLeft" value="Draai bord" />
<input type="button" id="rotateRight" value="Draai bord" />
<div id="console">

</div>
</body>
</html>















