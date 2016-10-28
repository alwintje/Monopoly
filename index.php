<!doctype html>
<html>
<head>
    <title>Monopoly</title>
    
    <link href="style/primary.css" rel="stylesheet">
    
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    
    <script>
        $( document ).ready(function (){
            
            $( "#players" ).change(function (){
                
                $("#names").load( "includes/names.php?n="+$( this ).val());
                $( "#startButton" ).fadeIn(500);
            });
        }); 
    </script>
</head>
<body>


<div class="config">
    <form action="game.php" method="get">
        Players:
        <select name="players" id="players">
            <option selected disabled>Kies aantal</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select>
        <div id="names">
            
        </div>
        <input type="submit" name="start" id="startButton" value="Start spel" />
    </form>
</div>

</body>
</html>















