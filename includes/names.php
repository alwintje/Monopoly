<?php

if(isset($_GET['n'])){

    echo '
        <script>
            $( document ).ready(function (){
                $( ".tokenChoose" ).change(function(){
                    
                    var src = "icons/tokens/" + $( this ).val() + ".png";
                    $( "#image" + $( this ).attr("name") ).attr("src",src);
                    
                });
            });
        </script>
        <table>
            <tr>
                <th>
                    Speler
                </th>
                <th>
                    Naam
                </th>
                <th>
                    Pion
                </th>
            </tr>
            
            ';
    for($i=1;$i <= $_GET['n'];$i++){
        echo '
            <tr>
                <td>
                    '.$i.'
                </td>
                <td>
                    <input type="text" name="name'.$i.'" placeholder="player '.$i.'" style="margin: 2px;padding: 2px;" />
                </td>
                <td>
                    <select name="token'.$i.'" class="tokenChoose">
                        <option value="1">Kruiwagen</option>
                        <option value="2">Schoen</option>
                        <option value="3">Auto</option>
                        <option value="4">Hond</option>
                        <option value="5">Hoed</option>
                        <option value="6">Strijkijzer</option>
                        <option value="7">Boot</option>
                        <option value="8">Vingerhoed</option>
                    </select>
                </td>
                <td>
                    <img id="imagetoken'.$i.'" height="30" src="icons/tokens/1.png" />
                </td>
            </tr>
            ';
    }
    echo '
        </table>
        ';
}

?>