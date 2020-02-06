<h1>Hoeveel geld wil je wisselen?</h1>
<form method="POST">
    <input type="text" name="geld" placeholder="Geld" />
    <input type="submit" name="submit" value="Wisselen" />
</form>
<h1>Je krijgt terug</h1>

<?php

$munten = [
    50=>"euro",
    20=>"euro",
    10=>"euro",
    5=>"euro",
    2=>"euro",
    1=>"euro",
    "0.5"=>"cent",
    "0.2"=>"cent",
    "0.1"=>"cent",
    "0.05"=>"cent"
];

if(isset($_POST["submit"])) {
    $input = 0;
    try {
        if(!isset($_POST["geld"])) throw new Exception("geen bedrag ingevoert");
        if(!is_numeric($_POST["geld"])) throw new Exception("dat is geen bedrag");
        $input = (round(doubleval($_POST["geld"])*2, 1)/2);
    }catch (Exception $e) {
        echo("Error: ".$e->getMessage());
    }

    foreach($munten as $waarde=>$extensie){
        $hoeveelheid = floor($input/$waarde);
        $input = fmod($input, $waarde);
        //if($hoeveelheid != 0) echo($hoeveelheid." X ".$waarde." ".$extensie."<br>");
        for($i = 0;$i<$hoeveelheid;$i++){
            if($hoeveelheid != 0) echo("<img width='200px' src='img/".$waarde.".png' />");
        }
    }

}

?>