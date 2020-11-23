<!DOCTYPE html>
<html lang='fr'>
    <head>
        <title>TP4</title>
    </head>
    <body>
    <h1>TP4 : Dates</h1>
    <hr>
	<h2>Exercice 1</h2>
    <?php
        $dateen = date("l d F Y");
        setlocale(LC_TIME, 'fr_FR.utf8');
        $datefr = strftime("%A %d %B %Y");
        $dateh = date("j/m/Y G:i");
        $unixt = time();
        echo "EN: ", $dateen, "<br>";
        echo "FR: ", $datefr, "<br>";
        echo "Date et heure : ", $dateh, "<br>";
        echo "Il est passé ", $unixt, "s depuis la première apparition d'UNIX";
    ?>
    <hr>
	<h2>Exercice 2</h2>
    <?php
        //$datenaissance = date("U", strtotime("15-04-1997"));
        $datenaissance = new DateTime();
        $datenaissance->setDate(1997, 4, 15);
        //$datenaissance = new DateTime("15-04-1997");
        $datejour = new DateTime('now');
        echo "Date de naissance : ", date_format($datenaissance, "d-m-Y"), "<br>";
        echo "Date du jour : ", date_format($datejour, "d-m-Y G:i"), "<br>";
        $diff = $datenaissance->diff($datejour);
        echo "Age : ", $diff->format("%Y ans %m mois et %d jours = %a jours = "), (time()-mktime(0,0,0,15,4,1997)), "s";
    ?>
    <hr>
	<h2>Exercice 3</h2>
    <h3>1.</h3>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
        $daterot = new DateTime('2020-10-31T23:06:55');
        $periode = new DateInterval('P29DT12H44M3S');
        $daterot->add($periode);
        echo "Prochaine pleine lune : ", date_format($daterot, 'Y-m-d h:i:s'), "<br>";
    ?>
    <h3>2.</h3>
    <?php
        for ($i=0 ; $i < 99 ; $i++){ 
            $daterot->add($periode);
        }
        echo "100 ème pleine lune : ", date_format($daterot, 'Y-m-d h:i:s'), "<br>";
    ?>
    <hr>
    <h2>Exercice 4</h2>
    <?php
        if(checkdate(2, 29, 1962)){
            echo "La date existe.<br>";
        }else{
            echo "La date n'existe pas.<br>";
        }
    ?>
    <hr>
    <h2>Exercice 5</h2>
    <?php
        $datej = new DateTime('1962-03-03');
        echo date_format($datej, 'l');
    ?>
    <hr>
    <h2>Exercice 6</h2>
    <?php
        for ($i=2020 ; $i <= 2062 ; $i++) { 
            if(date("m-d", mktime(0,0,0,2,29,$i)) == "02-29"){
                echo $i, " année bissextile<br>";
            }else{
                echo $i, " année non bissextile<br>";
            }
        }
    ?>
    <hr>
    <h2>Exercice 7</h2>
    <?php
        for ($i = 2021 ; $i <= 2031 ; $i++) { 
            $dateprmai = new DateTime("$i-5-1");
            if(date_format($dateprmai, 'N') >= 6){
                echo $i, " pas de pont<br>";
            }else if(date_format($dateprmai, 'N') == 1 || date_format($dateprmai, 'N') == 5){
                echo $i, " pont<br>";
            }else{
                echo $i, " autre<br>";
            }
        }
    ?>
    </body>
</html>
