<!DOCTYPE html>
<html lang='fr'>
    <head>
        <h1>TP3 : Fonctions</h1>
    </head>
    <body>
        <hr>
		<h2>Exercice 1</h2>
        <?php
            function incrVal($var, $val){
                $var+=$val;
                return $var;
            }
        ?>
        <hr>
		<h2>Exercice 2</h2>
        <?php
            function modifVal(&$var, $val){
                $var=$val;
            }
        ?>
        <hr>
		<h2>Exercice 3</h2>
        <h3>1.</h3>
        <?php
        echo $nonexistentVariable; // E_NOTICE
        
            $identite = ['alain', 'basile', 'David', 'Edgar'];
            $age = [1, 15, 35, 65];
            $mail = ['penom.nom@gtail.be', 'truc@bruce.zo', 'caro@caramel.org', 'trop@monmel.fr'];
        ?>
        <h3>2.</h3>
        <?php
            function extractDomain($mail){
                $taille = strlen($mail);
                $tableau = $mail;
                $valid = true;
                $vals = ['', ''];
                for($i = $taille-1 ; $i > 0 ; $i++){
                    if($tableau[i] == '.' && $valid){
                        $vals[1] = substr($mail, $taille-($taille-$i), $taille-$i);
                        $valid = false;
                    }else if($tableau[i] == '@'){
                        $vals[0] = substr($mail, $taille-($taille-$i), $taille-$i);
                        return $vals;
                    }
                }
            }
        ?>
        <h3>3.</h3>
        <?php
            function affRandom($tab1, $tab2, $tab3){
                $random = random_int(0, sizeof($tab1)-1);
                $nom = ucfirst($tab1[$random]);
                $age = $tab2[$random];
                if($age <= 1){
                    $denominationAge = "an";
                }else{
                    $denominationAge = "ans";
                }
                $mail = $tab3[$random];
                $mailInfos = extractDomain($mail);
                echo "Je me nomme " + $nom + " j'ai " + $age + " " + $denominationAge + " et mon mail est " + $mail + " du domaine " + $mailInfos[0] + " avec l'extension " + $mailInfos[1];
            }
        ?>
        <h2>Exercice 4</h2>
        <?php
            function ligne(){
                echo "* * * * *<br><br>";
            }
            function carrePlein(){
                echo "* * * * *<br>";
                echo "* * * * *<br>";
                echo "* * * * *<br>";
                echo "* * * * *<br>";
                echo "* * * * *<br><br>";
            }
            function triangleIso(){
                echo "*<br>";
                echo "* *<br>";
                echo "* * *<br>";
                echo "* * * *<br>";
                echo "* * * * *<br><br>";
            }
            function carreVide(){
                echo "* * * * *<br>";
                echo "* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *<br>";
                echo "* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *<br>";
                echo "* &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; *<br>";
                echo "* * * * *<br><br>";
            }
            function triangleVide(){
                echo "*<br>";
                echo "* *<br>";
                echo "* &nbsp;&nbsp;  *<br>";
                echo "*  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   *<br>";
                echo "* * * * *<br><br>";
            }
            function triangleVideInv(){
                echo "* * * * *<br>";
                echo "*  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   *<br>";
                echo "* &nbsp;&nbsp;  *<br>";
                echo "* *<br>";
                echo "*<br>";
            }
            ligne();
            carrePlein();
            triangleIso();
            carreVide();
            triangleVide();
            triangleVideInv();
        ?>
        <h2>Exercice 5</h2>
        <h3>1.</h3>
        <?php
            function echangerlettre($lettre, $cle){
                $int = ord($lettre);
                if($int > 64 && $int < 91){
                    $int+=$cle;
                    while($int > 90){
                        $int-=26;
                    }
                    while($int < 65){
                        $int+=26;
                    }
                }
                return chr($int);
            }
            echo "<h3>2.</h3>";
            function coder($chaine, $cle){
                $size = strlen($chaine);
                for ($i=0 ; $i < $size ; $i++) {
                    $chaine[$i] = echangerlettre($chaine[$i], $cle);
                }
                return $chaine;
            }
            function decoder($chaine, $cle){
                $size = strlen($chaine);
                for ($i=0 ; $i < $size ; $i++) {
                    $chaine[$i] = echangerlettre($chaine[$i], -$cle);
                }
                return $chaine;
            }
            echo "<h3>3.</h3>";
            $chaine = "ATTAQUEZ ASTERIX";
            $chaine = coder($chaine, 3);
            echo $chaine;
            echo "<br>";
            $chaine = decoder($chaine, 3);
            echo $chaine;
        ?>
        <h2>Exercice 6</h2>
        <?php
            echo "<h3>1.</h3>";
            function coderViginere($chaine, $cle){
                $size = strlen($chaine);
                $clesize = 1;
                $n = 0;
                $str = strval($cle);
                (int)$clecp = $cle;
                while($clecp >= 10){
                    $clecp/=10;
                    $clesize+=1;
                }
                for ($i=0 ; $i < $size ; $i++) {
                    $chaine[$i] = echangerlettre($chaine[$i], (int)$str[$n]);
                    if($chaine[$i] != ' '){
                        if($n < $clesize-1){
                            $n+=1;
                        }else{
                            $n = 0;
                        }
                    }
                }
                return $chaine;
            }
            echo "<h3>2.</h3>";
            function decoderViginere($chaine, $cle){
                $size = strlen($chaine);
                $clesize = 1;
                $n = 0;
                $str = strval($cle);
                (int)$clecp = $cle;
                while($clecp >= 10){
                    $clecp/=10;
                    $clesize+=1;
                }
                for ($i=0 ; $i < $size ; $i++) {
                    $chaine[$i] = echangerlettre($chaine[$i], -(int)$str[$n]);
                    if($chaine[$i] != ' '){
                        if($n < $clesize-1){
                            $n+=1;
                        }else{
                            $n = 0;
                        }
                    }
                }
                return $chaine;
            }
            echo "<h3>3.</h3>";
            $chaine = "ATTAQUEZ ASTERIX";
            $chaine = coderViginere($chaine, 314);
            echo $chaine;
            echo "<br>";
            $chaine = decoderViginere($chaine, 314);
            echo $chaine;
        ?>
        <h2>Exercice 7</h2>
        <?php
            echo "<h3>1.</h3>";
            $annuaire=array(
                "PUJOL Olivier"=>"03 89 72 84 48",
                "IMBERT Jo"=>"03 89 36 06 05",
                "SPIEGEL Pierre"=>"03 87 67 92 37",
                "THOUVENOT Frédéric"=>"01 42 86 02 12",
                "MEGEL Pierre"=>"09 59 71 46 96",
                "SUCHET Loïc"=>"03 89 33 10 54",
                "GIROIS Francis"=>"03 88 01 21 15",
                "HOFFMANN Emmanuel"=>"03 89 69 20 05",
                "KELLER Fabien"=>"04 18 52 34 25",
                "LEY Jean-Marie"=>"03 89 43 17 85",
                "ZOELLE Thomas"=>"04 18 65 67 69",
                "WILHELM Olivier"=>"03 89 60 48 78",
                "BLIN Nathalie"=>"01 28 59 23 25",
                "BICARD Pierre-Eric"=>"03 89 69 25 82",
                "ZIEGLER Thierry"=>"03 89 06 33 89",
                "BADER Jean"=>"03 89 25 65 72",
                "ROSSO Anne-Sophie"=>"01 56 20 02 36",
                "ROTTNER Thierry"=>"03 88 29 61 54",
                "WEBER Joao"=>"03 89 35 45 20",
                "SCHILLINGER Olivier"=>"03 84 21 38 40",
                "BICARD Muriel"=>"03 89 33 47 99 ",
                "KELLER Christian"=>"03 88 19 16 10 ",
                "GROELLY Antonio"=>"03 89 33 60 63",
                "ALLARD Aline"=>"03 89 56 49 19",
                "WINNINGER Bénédicte"=>"04 16 14 86 66");
            echo "<h4>a.</h4>";
            ksort($annuaire);
            $taille = sizeof($annuaire);
            echo "<table>";
            foreach ($annuaire as $nom => $numero) {
                echo "<tr>";
                echo "<td>", $nom, "</td><td>", $numero, "</td>";
                echo "</tr>";
            }
            echo "</table>";
        ?>
        <h2>Exercice 8</h2>
        <?php
            function etat($A1 = false, $A2 = false, $A3 = false, $A4 = false, $A5 = false, $A6 = false){
                if($A2 && $A6){
                    return true;
                }else if(A1 && ( A3 || ( $A4 && $A5 ))){
                    return true;
                }else{
                    return false;
                }
            }
            $etat1 = etat(true, true, false, false, false, true);
            $etat2 = etat(true, true, true, false, false, false);
            $etat2 = etat(true, true, false, false, false, false);
            echo $etat1,"<br>";
            echo $etat2,"<br>";
            echo $etat3,"<br>";
        ?>
        <h2>Exercice 9</h2>
        <h3>1.</h3>
        <?php
            $clients = ["1"=>"Dulong","ville 1"=>"Paris","age 1"=>"35","2"=>"Leparc","ville 2"=>"Lyon","age 2"=>"47","3"=>"Dubos","ville 3"=>"Tours","age 3"=>"58"];
            /*function addpersonne(&$chaine, $num, $nom, $ville, $age){
                $chaine[strval($num)] = $nom;
                $nville = "ville ";
                echo $nville;
                $nville+=strval($num);
                echo $nville;
                $nage = "age "+strval($num);
                $chaine[$nville] = $ville;
                $chaine[$nage] = $age;
            }
            addpersonne($clients, 7, "Duval", "Nantes", 24);*/
            $clients["7"] = "Duval";
            $clients["ville 7"] = "Nantes";
            $clients["age 7"] = "25";
            echo $clients["7"];
            echo $clients["ville 7"];
            echo $clients["age 7"];
        ?>
        <h2>Exercice 10</h2>
        <?php
            function isPalindrome($chaine){
                $size = strlen($chaine);
                $j = $size-1;
                for ($i=0 ; $i < $size ; $i++) { 
                    if($i < $j){
                        if($chaine[$i] != $chaine[$j]){
                            return false;
                        }
                        $j-=1;
                    }else{
                        return true;
                    }
                }
            }
            echo "maam",isPalindrome("maam"),"<br>";
            echo "mazam",isPalindrome("mazam"),"<br>";
            echo "mazm",isPalindrome("mazm"),"<br>";
            echo "mazjm",isPalindrome("mazjm"),"<br>";
        ?>
        <h2>Exercice 11</h2>
        <?php
            function validCard($chaine){
                $size = strlen($chaine);
                echo $size;
                for ($i= $size-1 ; $i >= 0 ; $i-=2){ 
                    $chaine[$i]*=2;
                    while($chaine[$i]){
                        $chaine[$i]-=9;
                    }
                }
                $somme = 0;
                for($i = 0 ; $i < $size ; $i++){
                    $somme+=$chaine[$i];
                }
                if($somme%10 == 0){
                    echo "Numéro valide";
                }else{
                    echo "Numéro non valide";
                }
            }
            $chaine = [5,5,3,9];
            validCard($chaine);
            $chaine = [9,9];
            validCard($chaine);
        ?>
    </body>
</html>
